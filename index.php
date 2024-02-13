<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="styles/embla.css">
  <link rel="stylesheet" href="styles/main.css">
	<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
	<script src="js/embla.js" defer></script>
	<link rel="icon" type="image/svg+xml" href="logo.svg" sizes="any">
	<title>Home</title>
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
	crossorigin="anonymous"></script>
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
				<?php
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                echo '<button class="add-cart-btn">Добавить карту</button>';
            }
            ?>
				<div class="grid lg:grid-cols-2 gap-8">
				<?php
		$dbname = './components/php-back/courses.db'; // Змініть шлях до вашої бази даних

		// Встановлення підключення до SQLite бази даних
		$conn = new SQLite3($dbname);

		$query = "SELECT * FROM courses LIMIT 5"; // Припускаємо, що у вас є таблиця `courses`
		$result = $conn->query($query);

		if ($result) {
			while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
				// Тут ви вставляєте дані курсу в HTML
				echo "<div class='ml-6'>";
				if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
					echo "<div class='admin-buttons'>";
					echo "<button class='edit-btn' onclick='editCard(" . $row['id'] . ")'>Редактировать</button>";
					echo "<button class='delete-btn' onclick='confirmDelete(" . $row['id'] . ")'>Удалить</button>";
					echo "</div>";
				}
				echo "<div class='grid grid-cols-5 bg-cover bg-neutral-750 border border-neutral-700 rounded-lg' style='background-image: url(\"/assets/images/heatmap.svg\");'>";

				echo "<div class='col-span-2 flex items-start -ml-6'>";
				// Використовуйте правильний шлях для зображення
				echo "<img class='drag-none select-none' src='./components/php-back/" . htmlspecialchars($row['image']) . "' alt=''>";
				echo "</div>";

				echo "<div class='col-span-3 flex flex-col font-tactic border-l border-neutral-800'>";
				echo "<div class='flex gap-4 p-4 border-b border-neutral-800'>";
				echo "<span class='font-semibold text-lg text-white'>" . htmlspecialchars($row['title']) . "</span>";

				if ($row['is_hit']) { // Перевірка, чи є курс хітом
					echo "<span class='px-6 py-1 font-light text-xs text-white bg-red-925 border border-red-800 rounded-lg'>Хит!</span>";
				}

				echo "</div>";
				echo "<div class='p-4'>";
				echo "<span class='text-white text-xs'>" . htmlspecialchars($row['description']) . "</span>";
				echo "</div>";
				echo "</div>";

				echo "<div class='col-span-5 flex justify-between items-center gap-2 font-tactic text-white p-5 border-t border-neutral-800'>";
				echo "<span class='font-tactic font-medium text-[15px] text-white'>Стоимость <br> курса</span>";

				echo "<div class='w-3/5 flex flex-wrap justify-center items-center gap-4'>";
				echo "<span class='text-2xl font-semibold whitespace-nowrap'>" . htmlspecialchars($row['price']) . " P</span>";
				echo "<button class='py-5 px-8 font-medium border-2 border-azure-400 border-opacity-70 rounded-2xl transition-colors cursor-pointer hover:border-opacity-100'>В корзину</button>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
		} else {
			echo "Курси не знайдено.";
		}

		$conn->close();
		?>


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
	<div class="add-cart-modal" id="editModal">
	<form class="creat-course">
		<div class="close-add-modal">+</div>
		<input type="text" name="title" placeholder="Назва" required>
		<textarea name="description" placeholder="Опис"></textarea>
		<input type="file" name="image" accept="image/*">
		<input type="number" name="price" placeholder="Ціна" required>
		<input type="checkbox" name="is_hit" value="1"> Хит
		<input type="file" name="videos[]" accept="video/*" multiple>
		<button type="submit">Добавить курс</button>
	</form>
	</div>
	<?php include("./components/footer.php") ?>
	<script src="./js/add-del.js"></script>
</body>
</html>