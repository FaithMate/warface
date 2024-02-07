<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="styles/embla.css">
	<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
	<script src="js/embla.js" defer></script>
	<link rel="icon" type="image/svg+xml" href="logo.svg" sizes="any">
	<title>Home</title>
</head>

<?php include("./data/index/courses.php") ?>
<?php include("./data/index/previews.php") ?>
<?php include("./data/index/faq.php") ?>

<body class="flex flex-col justify-start items-center">	
	<main class="w-full flex flex-col items-center overflow-hidden">
		<section class="w-full flex flex-col justify-center items-center p-5 bg-[url('/assets/images/index/promo-sm.png')] md:bg-[url('/assets/images/index/promo.png')] bg-cover bg-center">
			<?php include("./components/global/header.php") ?>
			
			<div class="w-full h-[110vh] flex flex-col justify-center items-center gap-10">
				<div class="flex flex-col items-center font-tactic text-white mt-[100%] md:mt-[unset]">
					<span class="font-semibold text-center text-[40px] md:text-[72px] md:whitespace-nowrap">
						Выбери курс для <span class="text-azure-400">Себя!</span>
					</span>
					<span class="text-center text-3xl">
						Играй на всех классах как бог
					</span>
				</div>

				<a 
					href="/courses"
					class="
						min-w-[350px] inline-flex items-center justify-center p-10 text-[17px] font-medium font-tactic text-white text-md bg-azure-400 whitespace-nowrap 
						rounded-2xl transition-shadow disabled:pointer-events-none disabled:opacity-50 shadow-[0px_7px_0px_0px_#11748A] hover:shadow-[0px_7px_0px_0px_#11748A,inset_0px_4px_23.2px_0px_#FFFFFF80]
					"
				>
					Подобрать курс
				</a>
			</div>
		</section>

		<div class="max-w-limit w-9/10 lg:w-2/3 flex flex-col items-center gap-[100px] -mt-[10%]">
			<section class="w-full flex flex-col justify-center items-center gap-[50px]">
				<h2 class="w-full p-6 font-tactic font-medium text-azure-200 text-3xl xl:text-[44px] xl:leading-[44px] bg-neutral-800 border border-neutral-700 rounded-lg">
					О курсах
				</h2>

				<iframe class="block xs:hidden" width="350" height="200" src="https://www.youtube.com/embed/iRXMebU053Y?si=JZCMjm2o1ihokzwh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				<iframe class="hidden xs:block md:hidden" width="450" height="250" src="https://www.youtube.com/embed/iRXMebU053Y?si=JZCMjm2o1ihokzwh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				<iframe class="hidden md:block lg:hidden" width="700" height="350" src="https://www.youtube.com/embed/iRXMebU053Y?si=JZCMjm2o1ihokzwh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				<iframe class="hidden lg:block" width="950" height="600" src="https://www.youtube.com/embed/iRXMebU053Y?si=JZCMjm2o1ihokzwh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</section>

			<section class="w-full flex flex-col gap-8">
				<h2 class="w-full p-6 font-tactic font-medium text-azure-200 text-3xl xl:text-[44px] xl:leading-[44px] bg-neutral-800 border border-neutral-700 rounded-lg">
					Наши курсы
				</h2>

				<div class="grid lg:grid-cols-2 gap-8">
					<?php foreach($courses as $key=>$item): ?>
						<?php 
							$image = $item->image;
							$title = $item->title;
							$desc = $item->desc;
							$price = $item->price;
							$hit = $item->hit;
							include("./components/cards/course-card.php")
						?>
					<?php endforeach; ?>
				</div>
			</section>

			<section class="w-full flex flex-col gap-[50px]">
				<h2 class="w-full p-6 font-tactic font-medium text-azure-200 text-3xl xl:text-[44px] xl:leading-[44px] bg-neutral-800 border border-neutral-700 rounded-lg">
					Отзывы
				</h2>

				<div class="embla">
					<div class="embla__viewport">
						<div class="embla__container">
							<?php foreach($previews as $key=>$item): ?>
								<div class="embla__slide">
									<div class="embla__slide__inner">
										<?php 
											$image = $item->image;
											$by = $item->by;
											$type = $item->type;
											$desc = $item->desc;
											include("./components/cards/preview-card.php")
										?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>

			<section class="w-full flex flex-col gap-[50px] mb-8">
				<h2 class="w-full p-6 font-tactic font-medium text-azure-200 text-3xl xl:text-[44px] xl:leading-[44px] bg-neutral-800 border border-neutral-700 rounded-lg">
					Часто задаваемые вопросы
				</h2>

				<div class="flex flex-col gap-[10px]">
					<?php foreach($faq as $key=>$item): ?>
						<?php 
							$summary = $item->summary;
							$content = $item->content;
							include("./components/global/details.php")
						?>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
	</main>

	<?php include("./components/footer.php") ?>
</body>
</html>