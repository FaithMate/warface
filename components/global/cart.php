<script>
window.addEventListener("load", () => {
	const CART_BTN = document.querySelector("#cart-btn");
	const CART_POPUP = document.querySelector("#cart-popup");

	CART_BTN.addEventListener("click", () => {
		console.log('cart click', CART_POPUP.dataset.visible);

		if(CART_POPUP.dataset.visible === "true") {
			CART_POPUP.dataset.visible = false;
		} else {
			CART_POPUP.dataset.visible = true;
		}
	});
});
</script>

<?php
	$cartItems = array(
		(object) [
			'image' => '/assets/images/courses/medic.png',
			'title' => 'Курс название',
			'price' => '299',
		],
	);
?>

<div class="relative flex items-center">
	<button id="cart-btn" class="group flex items-center justify-center gap-1 relative mx-2">
		<svg xmlns="http://www.w3.org/2000/svg" width="31" height="26" viewBox="0 0 31 26" fill="none">
			<path d="M29.1364 9.57895H22.6045L16.6318 0.602105C16.3727 0.218947 15.9364 0 15.5 0C15.0636 0 14.6273 0.218947 14.3682 0.61579L8.39545 9.57895H1.86364C1.11364 9.57895 0.5 10.1947 0.5 10.9474C0.5 11.0705 0.5 11.1937 0.554545 11.3168L4.01818 24.0021C4.33182 25.1516 5.38182 26 6.63636 26H24.3636C25.6182 26 26.6682 25.1516 26.9955 24.0021L30.4591 11.3168L30.5 10.9474C30.5 10.1947 29.8864 9.57895 29.1364 9.57895ZM15.5 3.83158L19.3182 9.57895H11.6818L15.5 3.83158ZM24.3636 23.2632H6.63636L3.65 12.3158H15.5068H27.3636L24.3636 23.2632Z" fill="#35AFC0"/>
		</svg>
		<span class="text-zinc-600 font-tactic font-bold text-sm transition-colors group-hover:text-zinc-400 cursor-pointer">
			Корзина <span class="text-azure-400 cursor-pointer">(0)</span>
		</span>
	</button>

	<div 
		id="cart-popup"
		class="
			absolute right-0 top-14 max-w-[360px] sm:max-w-max flex flex-col gap-2 -mr-[70px] p-[50px] text-white bg-neutral-900 rounded-[20px] shadow-md z-50
			opacity-0 pointer-events-none -translate-y-3 transition-all transform data-[visible=true]:opacity-100 data-[visible=true]:translate-y-0 data-[visible=true]:pointer-events-auto
		"
		data-visible="false"
	>
		<div class="flex justify-between font-tactic font-medium">
			<span>Товары</span>

			<button class="text-zinc-600 transition-colors whitespace-nowrap hover:text-zinc-400">
				Очистить
			</button>
		</div>

		<div class="max-h-[300px] flex flex-col gap-2 overflow-y-scroll no-scrollbar">
			<div class="h-full">
				<?php foreach($cartItems as $key=>$item): ?>
					<div class="flex items-center gap-10">
						<div class="w-[100px] h-[100px]">
							<img src="<?php echo $item->image; ?>" alt="">
						</div>
						<div class="flex flex-col sm:flex-row gap-2">
							<span class="font-light whitespace-nowrap">
								<?php echo $item->title; ?>
							</span>
							<div class="flex items-center gap-2 ml-auto">
								<span class="font-bold whitespace-nowrap">
									<?php echo $item->price; ?> Р
								</span>
								<button class="opacity-70 transition-opacity hover:opacity-100">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M19 4H15.5L14.5 3H9.5L8.5 4H5V6H19M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19Z" fill="#35AFC0"/>
									</svg>
								</button>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="flex justify-between items-center gap-7">
			<div class="w-full font-tactic">
				<span class="font-medium text-zinc-600">
					Итого:
				</span>
				<span class="font-bold text-lg sm:text-[32px] whitespace-nowrap">
					299 Р
				</span>
			</div>

			<button 
				class="
					min-w-[186px] w-full h-full inline-flex items-center justify-center p-4 text-[17px] font-bold font-tactic text-white text-sm bg-azure-400 whitespace-nowrap 
					rounded-2xl transition-shadow disabled:pointer-events-none disabled:opacity-50 hover:shadow-[inset_0px_4px_23.2px_0px_#FFFFFF80]
				"
			>
				Оформить заказ
			</button>
		</div>
	</div>
</div>