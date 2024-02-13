<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="styles/main.css">
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
			<?php
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                echo '<button class="add-cart-btn">Добавить карту</button>';
            }
            ?>
			<div class="grid lg:grid-cols-2 gap-8">
			<?php
		$dbname = '../components/php-back/courses.db'; // Змініть шлях до вашої бази даних

		// Встановлення підключення до SQLite бази даних
		$conn = new SQLite3($dbname);

		$query = "SELECT * FROM courses LIMIT 5"; // Припускаємо, що у вас є таблиця `courses`
		$result = $conn->query($query);

		if ($result) {
			while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
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
	</main>

	<?php include "../components/footer.php" ?>
</body>
</html>