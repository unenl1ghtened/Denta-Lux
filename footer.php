<footer id="footer" class="footer light-background">
	<div class="container footer-top">
		<div class="row gy-4">
			<div class="col-lg-4 col-md-6 footer-about">
				<a href="index.html" class="logo d-flex align-items-center">
					<span class="website_name"><?php the_field('website-name', 'option') ?></span>
				</a>
				<div class="footer-contact pt-3">
					<?php
					// проверяем есть ли в повторителе данные
					if (have_rows('contacts', 'option')):
						// перебираем данные
						while (have_rows('contacts', 'option')) : the_row(); ?>

							<p>
								<strong><?php the_sub_field('title'); ?></strong>
								<span><?php the_sub_field('text'); ?></span>
							</p>
					<?php
						endwhile;
					else :
					// вложенных полей не найдено
					endif;
					?>
				</div>
			</div>

			<div class="col-lg-2 col-md-3 footer-links">
				<?php
				// Выводим имя меню
				$menu_name = 'footer_menu_1';
				$menu = wp_get_nav_menu_object(get_nav_menu_locations()[$menu_name]);

				if ($menu) {
					echo '<h4>' . esc_html($menu->name) . '</h4>';
				} else {
					echo '<h4>Меню не найдено</h4>';
				}
				?>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer_menu_1',
					'container' => false,
					'menu_class' => '',
					'items_wrap' => '<ul>%3$s</ul>',
				));
				?>
			</div>

			<div class="col-lg-2 col-md-3 footer-links">
				<?php
				// Выводим имя меню
				$menu_name = 'footer_menu_2';
				$menu = wp_get_nav_menu_object(get_nav_menu_locations()[$menu_name]);

				if ($menu) {
					echo '<h4>' . esc_html($menu->name) . '</h4>';
				} else {
					echo '<h4>Меню не найдено</h4>';
				}
				?>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer_menu_2',
					'container' => false,
					'menu_class' => '',
					'items_wrap' => '<ul>%3$s</ul>',
				));
				?>
			</div>

			<div class="col-lg-4 col-md-6 footer-about">
				<h3><?php the_field('slogan', 'option') ?></h3>
				<!-- Этот блок выводит все социальные ссылки из повторителя ACF socials -->
				<?php the_field('description', 'option') ?>
				<?php if (have_rows('socials', 'option')): ?>
					<div class="social-links d-flex mt-4">
						<?php while (have_rows('socials', 'option')): the_row();
							if (get_sub_field('socials_link')): ?>
								<a href="<?php echo esc_url(get_sub_field('socials_link')['url']); ?>" target="<?php echo get_sub_field('socials_link')['target'] ?: '_self'; ?>">
									<i class="bi bi-<?php echo strtolower(get_sub_field('socials_link')['title']); ?>"></i>
								</a>
						<?php endif;
						endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container copyright text-center mt-4">
		<p>
			© <span>Copyright</span>
			<strong class="px-1 sitename" data-key="website_name"><?php the_field('website-name', 'option') ?></strong>
			<span>All Rights Reserved</span>
		</p>
	</div>
</footer>

<!-- Scroll Top -->
<a
	href="#"
	id="scroll-top"
	class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<?php wp_footer(); ?>

</body>

</html>
