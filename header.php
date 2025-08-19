<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header id="header" class="header sticky-top">
		<div class="topbar d-flex align-items-center">
			<div class="container d-flex justify-content-center justify-content-md-between">
				<div class="d-none d-md-flex align-items-center">
					<i class="bi bi-clock me-1"></i> <?php the_field('work_time', 'option') ?>
				</div>
				<div class="d-flex align-items-center">
					<img
						src="<?php echo get_template_directory_uri(); ?>/assets/img/header-phone.gif"
						alt=""
						width="23px"
						height="23px" />
					&nbsp;
					<span>Позвони Сейчас</span>
					<a
						style="color: white; display: inline-block"
						href="<?php echo get_field('phone_number', 'option')['url'] ?>">
						&nbsp;<span><?php echo get_field('phone_number', 'option')['title']; ?>
						</span></a>
					<div class="lang-switcher__button">
						<button id="lang-switcher">RU</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Top Bar -->

		<div class="branding d-flex align-items-center">
			<div class="container position-relative d-flex align-items-center justify-content-end">
				<a href="<?php echo home_url(); ?>" class="logo d-flex align-items-center me-auto">
					<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="" /> -->
					<h1 class="sitename"><?php the_field('website-name', 'option') ?></h1>
				</a>

				<nav id="navmenu" class="navmenu">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main_menu',
						'container' => false,
						'menu_class' => '',
						'items_wrap' => '<ul>%3$s</ul>',
					));
					?>
					<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
				</nav>


				<a
					class="cta-btn light"
					href="tel:<?php echo get_field('phone_number', 'option')['url'] ?>">Позвонить</a>
			</div>
		</div>
	</header>
