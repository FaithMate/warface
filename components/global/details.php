<details class="group w-full text-white">
	<summary 
		class="
			flex justify-between items-center gap-3 px-8 py-5 text-lg font-semibold cursor-pointer list-none select-none font-tactic bg-neutral-900 border border-neutral-700 rounded-t-xl transition-all group-open:border-b-0
		"
	>
		<?php echo $summary; ?>
		<svg class="min-w-[35px] transform text-azure-400 transition-all duration-200 group-open:-rotate-180 group-open:text-white" fill="none" height="25" width="35" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" viewBox="0 0 24 24">
			<polyline points="6 9 12 15 18 9"></polyline>
		</svg>
	</summary>
	<div class="px-8 py-5 bg-neutral-900 border border-t-0 border-neutral-700 rounded-b-xl">
		<p>
			<?php echo $content; ?>
		</p>
	</div>
</details>