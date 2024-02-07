<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
	<link rel="icon" type="image/svg+xml" href="logo.svg" sizes="any">
	<script src="js/auth.js" defer></script>
	<title>Авторизация</title>
</head>

<body class="flex flex-col justify-start items-center">
	<?php include("../components/global/header.php")?>

	<main class="max-w-limit w-9/10 md:w-3/4 flex flex-col gap-16 my-16">
		<section class="bg-gray-925">
			<div class="flex justify-center">
				<div class="hidden xl:flex max-w-[400px]">
					<img src="/assets/images/auth/cover.png" alt="" class="h-full drag-none select-none object-cover">
				</div>

				<div class="flex flex-1 flex-col p-[50px] bg-[url(/assets/images/auth/heatmap.svg)] bg-no-repeat">
					<h1 class="view-button w-full inline-flex items-center justify-center mb-[50px] px-3 py-2 text-center text-lg sm:text-3xl text-white font-medium font-tactic">
						Восстановление пароля
					</h1>

					<form action="" class="w-full flex flex-col gap-8">
						<?php 
							$placeholder="Почта";
							$append="";
							$prepend="";
							include("../components/global/input.php")
						?>
						
						<?php 
							$id="signin-btn";
							$title="Отправить письмо";
							include("../components/global/button.php")
						?>
					</form>
				</div>
			</div>
		</section>
	</main>

	<?php include "../components/footer.php" ?>
</body>
</html>