<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/index.css">
	<link rel="stylesheet" href="styles/embla.css">
	<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
	<script src="js/embla.js" defer></script>
	<script src="js/courses.js" defer></script>
	<link rel="icon" type="image/svg+xml" href="logo.svg" sizes="any">
	<title>Мои курсы</title>
</head>

<?php include("../data/user-courses.php") ?>

<body class="flex flex-col justify-start items-center">
	<?php include("../components/global/header.php")?>

	<main class="max-w-limit w-9/10 md:w-4/5 flex flex-col gap-8 my-16">
		<?php include("../components/global/breadcrumbs.php") ?>

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

		<section class="flex flex-col items-center gap-8">
			<div class="grid lg:grid-cols-2 gap-8">
				<?php foreach($courses as $key=>$item): ?>
					<div class="ml-6">
						<div class="grid grid-cols-5 bg-[url('/assets/images/heatmap.svg')] bg-cover bg-neutral-750 border border-neutral-700 rounded-lg">
							<div class="col-span-5 xs:col-span-2 max-w-[156px] xs:max-w-max flex justify-center items-start mx-auto -mt-6 xs:mt-0 xs:-ml-6">
								<img class="drag-none select-none" src="<?php echo $item->image; ?>" alt="">
							</div>
							
							<div class="col-span-5 xs:col-span-3 flex flex-col font-tactic border-l border-neutral-800">
								<div class="flex gap-4 p-4 border-b border-neutral-800">
									<span class="font-semibold text-lg text-white">
										<?php echo $item->title; ?>
									</span>
								</div>

								<div class="p-4">
									<span class="text-white text-xs">
										<?php echo $item->desc; ?>
									</span>
								</div>
							</div>

							<div class="col-span-5 flex justify-between items-center p-5 whitespace-nowrap border-t border-neutral-800">
								<div class="flex justify-center items-center gap-2 font-semibold text-xs">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10 18C14.4 18 18 14.4 18 10C18 5.6 14.4 2 10 2C5.6 2 2 5.6 2 10C2 14.4 5.6 18 10 18ZM10 0C15.5 0 20 4.5 20 10C20 15.5 15.5 20 10 20C4.5 20 0 15.5 0 10C0 4.5 4.5 0 10 0ZM13.3 14.2L12 15L9 9.8V5H10.5V9.4L13.3 14.2Z" fill="#35AFC0"/>
									</svg>
									<span class="text-gray-500">Длительность:</span>
									<span class="text-white"><?php echo $item->duration; ?></span>
								</div>

								<a href="/" class="ml-auto py-5 px-8 font-tactic font-semibold text-white border-2 border-azure-400 border-opacity-70 rounded-2xl transition-colors cursor-pointer hover:border-opacity-100">
									Перейти
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	</main>

	<?php include "../components/footer.php" ?>
</body>

</html>