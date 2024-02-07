<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/index.css">
	<link rel="icon" type="image/svg+xml" href="logo.svg" sizes="any">
	<title>Страница не найдена</title>
</head>

<body class="h-screen flex flex-col justify-start items-center">
	<?php include("../components/global/header.php") ?>

	<main class="max-w-limit flex flex-1 flex-col justify-center items-center gap-8 py-10 px-4">
		<div class="flex flex-col">
			<div class="text-neutral-400 font-bold py-2 px-5 bg-neutral-700">
				<span>Ошибка загрузки страницы</span>
			</div>
			<div class="flex flex-col gap-4 py-4 px-5 bg-white">
				<p>
					Страница не найдена.
				</p>
				<p>
					Пожалуйста, проверьте введенную ссылку.
				</p>
				<a href="/" class="w-[100px] p-1 ml-auto text-white text-center bg-blue-500 transition-colors hover:bg-blue-600">
					OK
				</a>
			</div>
		</div>
	</main>

	<?php include("../components/footer.php") ?>
</body>
</html>