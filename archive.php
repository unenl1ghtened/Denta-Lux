<?php
/*
Template Name: Страница Всех Услуг
*/

get_header();
?>

<main class="main">
	<!-- Page Title -->
	<div class="page-title">
		<div class="heading">
			<div class="container">
				<div class="row d-flex justify-content-center text-center">
					<div class="col-lg-8">
						<h1 class="heading-title"><?php the_title(); ?></h1>
						<p class="mb-0">
							<?php the_content(); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<nav class="breadcrumbs">
			<div class="container">
				<?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs(); ?>
			</div>
		</nav>
	</div>
	<!-- End Page Title -->

	<!-- Services Section -->
	<section id="services" class="services section">
		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
			<h2>Комплексные стоматологические услуги в одном месте</h2>
			<p>
				Мы заботимся о Вашей улыбке и предлагаем решения для любых
				потребностей
			</p>
		</div>
		<!-- End Section Title -->

		<div class="container">
			<div class="row gy-4">
				<div
					class="col-lg-4 col-md-6"
					data-aos="fade-up"
					data-aos-delay="25">
					<div class="service-item position-relative">
						<div class="icon">
							<i class="fa-solid fa-wand-magic-sparkles"></i>
						</div>
						<a href="prevention_hygiene.html" class="stretched-link">
							<h3>Профилактика и гигиена</h3>
						</a>
						<p>
							Регулярная гигиена и профилактика — залог здоровья ваших
							зубов. Мы удалим зубной налет, предотвратим развитие кариеса и
							других заболеваний.
						</p>
					</div>
				</div>
				<!-- End Service Item -->

				<div
					class="col-lg-4 col-md-6"
					data-aos="fade-up"
					data-aos-delay="50">
					<div class="service-item position-relative">
						<div class="icon">
							<i class="fa-solid fa-tooth"></i>
						</div>
						<a href="caries_treatment.html" class="stretched-link">
							<h3>Лечение кариеса и пломбирование</h3>
						</a>
						<p>
							Мы лечим кариес на самых ранних стадиях, используя безопасные
							и долговечные пломбы. Ваши зубы будут как новые!
						</p>
					</div>
				</div>
				<!-- End Service Item -->

				<div
					class="col-lg-4 col-md-6"
					data-aos="fade-up"
					data-aos-delay="50">
					<div class="service-item position-relative">
						<div class="icon">
							<i class="fa-solid fa-face-laugh-beam"></i>
						</div>
						<a href="teeth_whitening.html" class="stretched-link">
							<h3>Отбеливание зубов</h3>
						</a>
						<p>
							Придите за белоснежной улыбкой! Мы используем безопасные
							методы отбеливания, которые обеспечат результат без
							повреждения эмали.
						</p>
					</div>
				</div>
				<!-- End Service Item -->

				<div
					class="col-lg-4 col-md-6"
					data-aos="fade-up"
					data-aos-delay="25">
					<div class="service-item position-relative">
						<div class="icon">
							<i class="fa-solid fa-teeth"></i>
						</div>
						<a href="prosthetics_implants.html" class="stretched-link">
							<h3>Протезирование и имплантация</h3>
						</a>
						<p>
							Восстановление утраченных зубов с помощью современных
							имплантов и протезов. Мы предложим наилучшее решение для
							вашего случая.
						</p>
					</div>
				</div>
				<!-- End Service Item -->

				<div
					class="col-lg-4 col-md-6"
					data-aos="fade-up"
					data-aos-delay="50">
					<div class="service-item position-relative">
						<div class="icon">
							<i class="fas fa-wheelchair"></i>
						</div>
						<a href="braces_aligners.html" class="stretched-link">
							<h3>Брекеты и элайнеры</h3>
						</a>
						<p>
							Исправление прикуса и выравнивание зубов с помощью брекетов
							или прозрачных элайнеров. Индивидуальный подход для каждого
							пациента.
						</p>
					</div>
				</div>
				<!-- End Service Item -->

				<div
					class="col-lg-4 col-md-6"
					data-aos="fade-up"
					data-aos-delay="600">
					<div class="service-item position-relative">
						<div class="icon">
							<i class="fas fa-notes-medical"></i>
						</div>
						<a href="tooth_extraction.html" class="stretched-link">
							<h3>Удаление зубов</h3>
						</a>
						<p>
							Удаление зубов при необходимости с использованием современных
							методов анестезии. Минимум дискомфорта и быстрая реабилитация.
						</p>
					</div>
				</div>
				<!-- End Service Item -->
			</div>
		</div>

		<div class="container">
			<div class="row gy-4">
				<?php
				// Запрос услуг
				$args = array(
					'post_type' => 'service', // Здесь 'service' — слаг твоего кастомного типа записи
					'posts_per_page' => -1, // Вывести все услуги
					'orderby' => 'menu_order', // Можно сортировать по порядку
					'order' => 'ASC',
				);
				$query = new WP_Query($args);

				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post();
				?>
						<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="25">
							<div class="service-item position-relative">
								<div class="icon">
									<?php echo get_field('service-icon') ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="stretched-link">
									<h3><?php the_title(); ?></h3>
								</a>
								<p>
									<?php
									// Получаем контент
									$content = get_the_content();

									// Разбиваем на предложения
									preg_match_all('/[^.!?]+[.!?]/', $content, $matches);

									// Ограничиваем вывод первыми двумя предложениями
									$first_two_sentences = implode(' ', array_slice($matches[0], 0, 4));

									// Выводим результат
									echo $first_two_sentences;
									?>
								</p>
							</div>
						</div>
				<?php
					endwhile;
					wp_reset_postdata();
				else :
					echo '<p>Услуги не найдены.</p>';
				endif;
				?>
			</div>
		</div>

	</section>
	<!-- /Services Section -->

	<!-- Contact Section -->
	<?php echo do_shortcode('[custom_contact_section]'); ?>
	<!-- /Contact Section -->
</main>

<?php
get_footer();
