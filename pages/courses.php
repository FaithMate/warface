<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
	<link rel="icon" type="image/svg+xml" href="logo.svg" sizes="any">
	<script src="js/courses.js" defer></script>
	<title>Курсы</title>
</head>

<?php include("../data/courses.php") ?>

<body class="flex flex-col justify-start items-center">
	<?php include("../components/global/header.php")?>

	<main class="max-w-limit w-9/10 md:w-4/5 flex flex-col gap-8 my-16">
		<?php include("../components/global/breadcrumbs.php") ?>

		<section class="flex flex-col items-center gap-8">
			<div class="w-full flex flex-col sm:flex-row gap-2 items-center font-tactic text-neutral-500 px-5 py-3 bg-neutral-750">
				<div class="flex justify-between items-center gap-10">
					<span>
						Тема курса:
					</span>

					<div class="relative">
						<button id="filter-select" class="flex gap-2 px-6 py-2 text-neutral-600 bg-neutral-800 cursor-pointer">
							Выбрать

							<svg class="min-w-[35px] transform text-azure-400 transition-transform duration-200 group-open:-rotate-90" fill="none" height="25" width="35" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" viewBox="0 0 24 24">
								<polyline points="6 9 12 15 18 9"></polyline>
							</svg>
						</button>

						<div 
							id="filter-options" 
							class="
								absolute top-0 left-1/2 min-w-max flex flex-col mt-12 p-5 bg-neutral-800 shadow-lg
								opacity-0 pointer-events-none -translate-y-3 transition-all transform -translate-x-1/2 data-[visible=true]:opacity-100 data-[visible=true]:translate-y-0 data-[visible=true]:pointer-events-auto
							"
							data-visible="false"
						>
							<button class="py-2 px-5 transition-colors hover:bg-neutral-700">Фильтр 1</button>
							<button class="py-2 px-5 transition-colors hover:bg-neutral-700">Фильтр 2</button>
						</div>
					</div>
				</div>

				<button class="mx-auto sm:mx-[unset] sm:ml-auto">
					Сбросить фильтры
				</button>
			</div>

			<div class="grid lg:grid-cols-2 gap-8">
				<?php foreach($courses as $key=>$item): ?>
					<?php 
						$image = $item->image;
						$title = $item->title;
						$desc = $item->desc;
						$price = $item->price;
						$hit = $item->hit;
						include("../components/cards/course-card.php")
					?>
				<?php endforeach; ?>
			</div>
		</section>
	</main>

	<?php include "../components/footer.php" ?>
</body>
</html>