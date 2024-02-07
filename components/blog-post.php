<a 
	class="group relative w-[330px] h-[186px] flex justify-center items-center rounded-[4px] overflow-hidden" 
	href="<?php echo $href; ?>"
	target="_blank"
>
	<span class="absolute bottom-4 left-4 right-4 max-w-max px-1 font-recoleta text-white bg-indigo-1000 pointer-events-none">
		<?php echo $title; ?>
	</span>
	<div class="flex bg-black bg-opacity-30 transition-colors group-hover:bg-opacity-0">
		<img 
			class="z-[-1]" 
			src="<?php echo $image; ?>"
			alt="<?php echo $alt; ?>"
		>
	</div>
</a>