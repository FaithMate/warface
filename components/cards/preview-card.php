<div class="flex justify-center items-center text-white bg-[url('/assets/images/heatmap.svg')] bg-cover rounded-[20px] bg-neutral-750">
	<div class="min-w-[120px] w-full h-full flex flex-col justify-center items-center gap-5 p-7 border-r border-neutral-800">
		<div class="w-[70px] h-[70px] md:w-[96px] md:h-[96px]">
			<img class="drag-none select-none" src="<?php echo $image; ?>" alt="<?php echo $by; ?>">
		</div>	

		<span class="font-tactic text-center break-words">
			<?php echo $by; ?>
		</span>
	</div>

	<div class="p-7">
		<span class="text-sm">
			<?php echo $desc; ?>
		</span>
	</div>
</div>