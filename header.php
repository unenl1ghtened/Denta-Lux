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
					<i class="bi bi-clock me-1"></i> Понедельник - Воскресенье, с 8:00 до 22:00
				</div>
				<div class="d-flex align-items-center">
					<img
						src="./assets/img/header-phone.gif"
						alt=""
						width="23px"
						height="23px" />
					&nbsp;
					<span>Позвони Сейчас</span>
					<a
						style="color: white; display: inline-block"
						href="tel:+37127097274">
						&nbsp;<span>+371 27 097 274</span></a>
					<div class="lang-switcher__button">
						<button id="lang-switcher">RU</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Top Bar -->

		<div class="branding d-flex align-items-center">
			<div class="container position-relative d-flex align-items-center justify-content-end">
				<a href="index.html" class="logo d-flex align-items-center me-auto">
					<!-- <img src="assets/img/logo.png" alt="" /> -->
					<h1 class="sitename">Denta Lux</h1>
				</a>

				<nav id="navmenu" class="navmenu">
					<ul>
						<li>
							<a href="index.html" class="active">Главная</a>
						</li>
						<li><a href="#about">О Нас</a></li>
						<li>
							<a href="services.html">Услуги</a>
						</li>
						<li><a href="#doctors">Врачи</a></li>
						<li>
							<a href="#contact">Контакты</a>
						</li>
					</ul>
					<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
				</nav>

				<a
					class="cta-btn light"
					href="index.html#appointment">Позвонить</a>
			</div>
		</div>
	</header>
