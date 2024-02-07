<div class="ml-6">
	<div class="grid grid-cols-5 bg-[url('/assets/images/heatmap.svg')] bg-cover bg-neutral-750 border border-neutral-700 rounded-lg">
		<div class="col-span-2 flex items-start -ml-6">
			<img class="drag-none select-none" src="<?php echo $image; ?>" alt="">
		</div>
		
		<div class="col-span-3 flex flex-col font-tactic border-l border-neutral-800">
			<div class="flex gap-4 p-4 border-b border-neutral-800">
				<span class="font-semibold text-lg text-white">
					<?php echo $title; ?>
				</span>

				<?php if($hit): ?>
					<span class="px-6 py-1 font-light text-xs text-white bg-red-925 border border-red-800 rounded-lg">
						Хит!
					</span> 
				<?php endif; ?> 
			</div>

			<div class="p-4">
				<span class="text-white text-xs">
					<?php echo $desc; ?>
				</span>
			</div>
		</div>

		<div class="col-span-5 flex justify-between items-center gap-2 font-tactic text-white p-5 border-t border-neutral-800">
			<span class="font-tactic font-medium text-[15px] text-white">
				Стоимость <br> курса
			</span>

			<div class="w-3/5 flex flex-wrap justify-center items-center gap-4">
				<span class="text-2xl font-semibold whitespace-nowrap">
					<?php echo $price; ?> P
				</span>

				<button class="py-5 px-8 font-medium border-2 border-azure-400 border-opacity-70 rounded-2xl transition-colors cursor-pointer hover:border-opacity-100">
					В корзину
				</button>
			</div>
		</div>
	</div>
</div>