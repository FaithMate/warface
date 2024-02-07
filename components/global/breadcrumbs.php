<?php
function wrap($breadcrumb)
{
	return "
		<li class='transition-colors hover:text-neutral-400'>
			$breadcrumb
		</li>
	";
}

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' / ', $home = 'Главная')
{
	// This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
	$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

	// This will build our "base URL" ... Also accounts for HTTPS :)
	$base = '/';

	// Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
	$breadcrumbs = array(wrap("<a href=\"$base\">$home</a>"));

	// Find out the index for the last value in our path array
	$key = array_keys($path);
	$last = end($key);

	// Build the rest of the breadcrumbs
	foreach ($path as $x => $crumb) {
		// Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
		$page = str_replace(array('.php', '_'), array('', ' '), $crumb);

		$pages = [
			"auth" => "Авторизация",
			"about-us" => "О нас",
			"courses" => "Курсы",
			"course-details" => "Медик",
			"user-courses" => "Мои курсы",
			"user-course" => "Курс медика",
			"reviews" => "Отзывы",
			"contacts" => "Контакт",
		];

		$title = $pages[$page];

		// If we are not on the last index, then display an <a> tag
		if ($x != $last)
			$breadcrumbs[] = wrap("<a href=\"$base$crumb\">$title</a>");
		// Otherwise, just display the title (minus)
		else
			$breadcrumbs[] = wrap("<span class='text-azure-300 font-semibold'>$title</span>");
	}

	// Build our temporary array (pieces of bread) into one big string :)
	return implode($separator, $breadcrumbs);
}

?>

<ul class="w-full flex gap-[10px] p-6 text-neutral-500 border border-neutral-700 rounded-[20px]">
	<?= breadcrumbs() ?>
</ul>