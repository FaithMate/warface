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
					<div class="flex mb-[50px]">
						<button 
							class="
								view-button w-full inline-flex items-center justify-center whitespace-nowrap px-3 py-2 text-lg sm:text-3xl text-white font-medium font-tactic border-b-[5px] border-gray-700 transition-colors 
								hover:border-white disabled:pointer-events-none disabled:opacity-50
								data-[active=true]:text-azure-400 data-[active=true]:border-azure-400
							" 
							data-for="signin-view" 
							data-active="true"
							type="button"
						>
							Вход
						</button>
						<button 
							class="
								view-button w-full inline-flex items-center justify-center whitespace-nowrap px-3 py-2 text-lg sm:text-3xl text-white font-medium font-tactic border-b-[5px] border-gray-700 transition-colors 
								hover:border-white disabled:pointer-events-none disabled:opacity-50
								data-[active=true]:text-azure-400 data-[active=true]:border-azure-400
							" 
							data-for="signup-view" 
							type="button"
						>
							Регистрация
						</button>
					</div>
					
					<div class="flex flex-col">
						<div 
							id="signin-view"
							class="content-view w-full flex flex-col items-center gap-6 aria-[hidden=true]:hidden"
							aria-hidden="false"	
						>
							<form action="" class="w-full flex flex-col gap-8">
								<?php 
									$placeholder="Почта";
									$append="";
									$prepend="";
									include("../components/global/input.php")
								?>
								<?php 
									$placeholder="Пароль";
									include("../components/global/input.php")
								?>
								
								<?php 
									$id="signin-btn";
									$title="Войти";
									include("../components/global/button.php")
								?>
							</form>

							<a href="/forgot-password" class="mt-auto font-tactic text-azure-400 hover:text-white transition-colors">
								Забыл пароль?
							</a>
						</div>

						<div 
							id="signup-view"
							class="content-view w-full aria-[hidden=true]:hidden"
							aria-hidden="true"
						>
							<form action="" class="w-full flex flex-col gap-8">
								<?php 
									$placeholder="Имя или ник";
									$append="";
									$prepend="";
									include("../components/global/input.php")
								?>
								<?php 
									$placeholder="Почта";
									include("../components/global/input.php")
								?>
								<?php 
									$placeholder="Пароль";
									include("../components/global/input.php")
								?>
								<?php 
									$placeholder="Повторите пароль";
									include("../components/global/input.php")
								?>
								
								<?php 
									$id="signup-btn";
									$title="Создать аккаунт";
									include("../components/global/button.php")
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<?php include "../components/footer.php" ?>
</body>
</html>