<nav class="flex flex-col gap-4 lg:flex-row items-center">
	<menu class="flex flex-col lg:flex-row items-center gap-6 lg:gap-16">
		<?php if (true): ?>
			<li class="py-2 px-3 mr-2 rounded-md font-tactic font-medium text-lg text-white transition-colors hover:text-azure-400">
				<a class="text-center" href="/courses">
					Курсы
				</a>
			</li>
			<li class="py-2 px-3 mr-2 rounded-md font-tactic font-medium text-lg text-white transition-colors hover:text-azure-400">
				<a class="text-center" href="/reviews">
					Отзывы
				</a>
			</li>
			<li class="py-2 px-3 mr-2 rounded-md font-tactic font-medium text-lg text-white transition-colors hover:text-azure-400">
				<a class="text-center whitespace-nowrap" href="/about-us">
					О нас
				</a>
			</li>
		<?php else: ?>
			<li class="py-2 px-3 mr-2 rounded-md font-tactic font-medium text-lg text-white transition-colors hover:text-azure-400">
				<a class="text-center whitespace-nowrap" href="/courses">
					Мои курсы
				</a>
			</li>
			<li class="py-2 px-3 mr-2 rounded-md font-tactic font-medium text-lg text-white transition-colors hover:text-azure-400">
				<a class="text-center whitespace-nowrap" href="/courses">
					Каталог курсов
				</a>
			</li>
		<?php endif; ?>
	</menu>
</nav>