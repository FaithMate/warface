<script>
window.addEventListener("load", () => {
	const AUTH_SHOW_BTN = document.querySelector("#auth-show-btn");
	const AUTH_HIDE_BTN = document.querySelector("#auth-hide-btn");
	const AUTH_DIALOG = document.querySelector("#auth-dialog");
	const AUTH_VIEW_BUTTONS = document.querySelectorAll(".auth-view-button");
	const AUTH_FORM_BUTTONS = document.querySelectorAll(".auth-form-button");

	AUTH_SHOW_BTN.addEventListener("click", () => toggleAuthDialog());
	AUTH_HIDE_BTN.addEventListener("click", () => toggleAuthDialog());

	function toggleAuthDialog() {
		if(AUTH_DIALOG.dataset.visible === "true") {
			AUTH_DIALOG.dataset.visible = false;
			document.body.classList.remove("overflow-hidden");
		} else {
			document.body.classList.add("overflow-hidden");
			AUTH_DIALOG.dataset.visible = true;
		}
	}

	AUTH_VIEW_BUTTONS.forEach(button => { handleButtonClick(button, ".content-view"); });
	AUTH_FORM_BUTTONS.forEach(button => { handleButtonClick(button, ".form-view"); });

	function handleButtonClick(button, type) {
		const viewId = button.dataset.for;

		button.addEventListener("click", (event) => {
			if(type === ".content-view") {
				const target = event.target;
				AUTH_VIEW_BUTTONS.forEach(button => { button.dataset.active = false; });
				target.dataset.active = true;
			}
			showContent(viewId, type)
		});
	}

	function showContent(viewId, type) {
		const contentViews = document.querySelectorAll(type);
		contentViews.forEach((view) => {
			view.setAttribute("aria-hidden", "true");
		});

		const selectedView = document.getElementById(viewId);
		if (selectedView) {
			selectedView.setAttribute("aria-hidden", "false");
		}
	}
});
</script>

<div 
	id="auth-dialog" 
	data-visible="false" 
	class="
		fixed inset-0 flex justify-center items-center bg-black bg-opacity-40 transition-opacity z-[100]
		opacity-0 pointer-events-none data-[visible=true]:opacity-100 data-[visible=true]:pointer-events-auto
	"
>
	<div class="relative max-w-[90%] sm:max-w-[75%] w-full bg-gray-925">
		<button id="auth-hide-btn" class="absolute top-5 right-5">
			<svg width="26" height="26" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M47.2191 0.780931C46.178 -0.26031 44.4897 -0.26031 43.4485 0.780931L24 20.2294L4.55155 0.780931C3.51033 -0.26031 1.82215 -0.26031 0.780933 0.780931C-0.260311 1.82215 -0.260311 3.51032 0.780933 4.55154L20.2294 24L0.780986 43.4483C-0.260258 44.4897 -0.260258 46.1777 0.780986 47.2191C1.8222 48.2603 3.51038 48.2603 4.5516 47.2191L24 27.7706L43.4485 47.2191C44.4897 48.2603 46.178 48.2603 47.2191 47.2191C48.2603 46.1777 48.2603 44.4897 47.2191 43.4485L27.7706 24L47.2191 4.55154C48.2603 3.51032 48.2603 1.82215 47.2191 0.780931Z" fill="#3A3A3A" />
			</svg>
		</button>
		
		<div class="flex justify-center">
			<div class="hidden xl:flex max-w-[400px]">
				<img src="/assets/images/auth/cover.png" alt="" class="h-full drag-none select-none object-cover">
			</div>

			<div class="flex flex-1 flex-col p-[50px] bg-[url(/assets/images/auth/heatmap.svg)] bg-no-repeat">
				<div 
					class="form-view flex flex-1 flex-col aria-[hidden=true]:hidden" 
					id="forgot-view"
					aria-hidden="true"
				>
					<h1 class="view-button w-full inline-flex items-center justify-center mb-[50px] px-3 py-2 text-center text-lg sm:text-3xl text-white font-medium font-tactic">
						Восстановление пароля
					</h1>

					<form action="" class="w-full flex flex-col gap-8">
						<?php 
							$placeholder="Почта";
							$append="";
							$prepend="";
							include(__DIR__ . "/input.php")
						?>
						
						<button 
							id="forgot-pass-btn"
							class="
								min-w-[196px] sm:min-w-[256px] w-full inline-flex items-center justify-center p-3 text-[17px] font-medium font-tactic text-white text-md bg-azure-400 whitespace-nowrap 
								rounded-2xl transition-shadow disabled:pointer-events-none disabled:opacity-50 hover:shadow-[inset_0px_4px_23.2px_0px_#FFFFFF80]
							"
						>
							Отправить письмо
						</button>
					
						<button 
							data-for="default-view"
							type="button"
							class="
								auth-form-button min-w-[196px] sm:min-w-[256px] w-full inline-flex items-center justify-center p-3 text-[17px] font-medium font-tactic text-white text-md bg-azure-400 whitespace-nowrap 
								rounded-2xl transition-shadow disabled:pointer-events-none disabled:opacity-50 hover:shadow-[inset_0px_4px_23.2px_0px_#FFFFFF80]
							"
						>
							Отмена
						</button>
					</form>
				</div>

				<div
					class="form-view flex flex-col aria-[hidden=true]:hidden"
					id="default-view" 
					aria-hidden="false"
				>
					<div class="flex mb-[50px]">
						<button 
							class="
								auth-view-button w-full inline-flex items-center justify-center whitespace-nowrap px-3 py-2 text-lg sm:text-2xl text-white font-medium font-tactic border-b-[5px] border-gray-700 transition-colors 
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
								auth-view-button w-full inline-flex items-center justify-center whitespace-nowrap px-3 py-2 text-lg sm:text-2xl text-white font-medium font-tactic border-b-[5px] border-gray-700 transition-colors 
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
									$name="email";
									include(__DIR__ . "/input.php")
								?>
								<?php 
									$placeholder="Пароль";
									$name="password";
									include(__DIR__ . "/input.php")
								?>
								
								<?php 
									$id="signin-btn";
									$title="Войти";
									include(__DIR__ . "/button.php")
								?>
							</form>

							<button 
								class="auth-form-button mt-auto font-tactic text-azure-400 hover:text-white transition-colors" 
								data-for="forgot-view"
							>
								Забыл пароль?
							</button>
						</div>

						<div 
							id="signup-view"
							class="content-view w-full aria-[hidden=true]:hidden"
							aria-hidden="true"
						>
							<form action="" class="w-full flex flex-col gap-8">
								<?php 
									$placeholder="Имя или ник";
									$name="name";
									include(__DIR__ . "/input.php")
								?>
								<?php 
									$placeholder="Почта";
									$name="email";
									include(__DIR__ . "/input.php")
								?>
								<?php 
									$placeholder="Пароль";
									$name="password";
									include(__DIR__ . "/input.php")
								?>
								<?php 
									$name="password-repeat";
									$placeholder="Повторите пароль";
									include(__DIR__ . "/input.php")
								?>
								
								<?php 
									$id="signup-btn";
									$title="Создать аккаунт";
									include(__DIR__ . "/button.php")
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>