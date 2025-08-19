<?php
/*
Template Name: Главная Страница
*/
get_header(); ?>

<main class="main">
  <!-- Hero Section -->
  <section id="hero" class="hero section">
    <div id="hero-carousel" class="carousel slide carousel-fade">
      <div class="carousel-item active">
        <?php
        $hero_bg = get_field('hero_bg');
        if ($hero_bg) {
          echo '<img src="' . esc_url($hero_bg['url']) . '" alt="' . esc_attr($hero_bg['alt']) . '" />';
        }
        ?>
        <div class="container">
          <h2>
            <?php echo get_field('hero_title') ?>
          </h2>
          <p>
            <?php echo get_field('hero_descripton') ?>
          </p>
          <a
            href="<?php echo get_field('phone_number', 'option')['url'] ?>"
            class="btn-get-started light"><?php echo get_field('hero_tel-text') ?></a>
          <a
            href="#contact"
            class="btn-get-started light"><?php echo get_field('hero_contact-btn-text') ?></a>
        </div>
      </div>
    </div>
  </section>
  <!-- /Hero Section -->

  <!-- Featured Services Section -->
  <section id="featured-services" class="featured-services section">
    <div class="container">
      <div class="row gy-4">
        <?php
        if (have_rows('featured_services')):
          while (have_rows('featured_services')) : the_row(); ?>
            <!-- Start Service Item -->
            <div
              class="col-xl-3 col-md-6 d-flex"
              data-aos="fade-up"
              data-aos-delay="20">
              <div class="service-item position-relative">
                <div class="icon">
                  <?php the_sub_field('icon'); ?>
                </div>
                <h4>
                  <a class="stretched-link"> <?php the_sub_field('title'); ?>
                  </a>
                </h4>
                <p>
                  <?php the_sub_field('description'); ?>
                </p>
              </div>
            </div>
            <!-- End Service Item -->
        <?php
          endwhile;
        else :
        // вложенных полей не найдено
        endif;
        ?>
      </div>
    </div>
  </section>
  <!-- /Featured Services Section -->

  <!-- Call To Action Section -->
  <section
    id="call-to-action"
    class="call-to-action section accent-background">
    <div class="container">
      <div
        class="row justify-content-center"
        data-aos="zoom-in"
        data-aos-delay="25">
        <div class="col-xl-10">
          <div class="text-center">
            <h3><?php echo get_field('cta_title') ?></h3>
            <p>
              <?php echo get_field('cta_descr') ?>
            </p>
            <div class="cta-btn-wrapper">
              <a
                class="cta-btn light"
                href="#appointment"><?php echo get_field('cta_button-text') ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Call To Action Section -->

  <!-- About Section -->
  <section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>
        <?php echo get_field('about_title') ?>
      </h2>
      <p>
        <?php echo get_field('about_subtitle') ?>
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container">
      <div class="row gy-4">
        <div
          class="col-lg-6 position-relative align-self-start"
          data-aos="fade-up"
          data-aos-delay="20">
          <?php
          $video_thumb = get_field('about_video_thumb');
          if ($video_thumb) {
            echo '<img class="img-fluid" src="' . esc_url($video_thumb['url']) . '" alt="' . esc_attr($video_thumb['alt']) . '" />';
          }
          ?>
          <a
            href="<?php echo get_field('about_video') ?>"
            class="glightbox pulsating-play-btn"></a>
        </div>
        <div
          class="col-lg-6 content"
          data-aos="fade-up"
          data-aos-delay="20">
          <!-- <h3>
            Мы – команда профессионалов, которая заботится о здоровье и
            красоте Вашей улыбки.
          </h3>
          <p class="fst-italic">
            В нашей клинике используются только проверенные методики,
            современное оборудование и качественные материалы.
          </p>
          <ul>
            <li>
              <i class="bi bi-check2-all"></i>
              <span>Удобное расположение в Риге (Золитуде)
              </span>
            </li>
            <li>
              <i class="bi bi-check2-all"></i>
              <span>Высокое качество по доступным ценам</span>
            </li>
            <li>
              <i class="bi bi-check2-all"></i>
              <span>Опытные специалисты</span>
            </li>
          </ul>
          <p>
            Мы предлагаем широкий спектр услуг – от профилактики до сложных
            хирургических операций.
          </p> -->

          <?php echo get_field('about_description') ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /About Section -->

  <!-- Stats Section -->
  <section id="stats" class="stats section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <?php
        if (have_rows('stats')):
          while (have_rows('stats')) : the_row(); ?>

            <div class="col-lg-3 col-md-6">
              <div class="stats-item d-flex align-items-center w-100 h-100">
                <?php the_sub_field('icon'); ?>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="<?php the_sub_field('number'); ?>"
                    data-purecounter-duration="1"
                    class="purecounter"></span>
                  <p><?php the_sub_field('text'); ?></p>
                </div>
              </div>
            </div>

        <?php
          endwhile;
        else :
        // вложенных полей не найдено
        endif;
        ?>

      </div>
    </div>
  </section>
  <!-- /Stats Section -->

  <!-- Services Section -->
  <section id="services" class="services section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>
        <?php echo get_field('services_title') ?>
      </h2>
      <p>
        <?php echo get_field('services_subtitle') ?>
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container">
      <div class="row gy-4">
        <?php
        // квери для постов 'service'
        $services_query = new WP_Query(array(
          'post_type' => 'service',
          'posts_per_page' => -1, // все посты
        ));

        if ($services_query->have_posts()) :
          while ($services_query->have_posts()) : $services_query->the_post(); ?>

            <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="20">
              <div class="service-item position-relative">
                <div class="icon">
                  <?php the_field('service-icon') ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="stretched-link">
                  <h3><?php the_title(); ?></h3>
                </a>
                <p>
                  <?php the_field('short_descr'); ?>
                </p>
              </div>
            </div>

        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </section>
  <!-- /Services Section -->

  <!-- Appointment Section -->
  <section id="appointment" class="appointment section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php the_field('appointment_title'); ?></h2>
      <p>
        <?php the_field('appointment_subtitle'); ?>
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="25">
      <form
        action="forms/appointment.php"
        method="post"
        role="form"
        class="php-email-form">
        <div class="row">
          <div class="col-md-4 form-group">
            <input
              type="text"
              name="name"
              class="form-control"
              id="name"
              placeholder="Ваше Имя"
              required="" />
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input
              type="email"
              class="form-control"
              name="email"
              id="email"
              placeholder="Ваш Email"
              required="" />
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input
              type="tel"
              class="form-control"
              name="phone"
              id="phone"
              placeholder="Ваш Телефон"
              required="" />
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea
            class="form-control"
            name="message"
            rows="5"
            placeholder="Сообщение"></textarea>
        </div>
        <div class="mt-3">
          <div class="loading">
            Загрузка
          </div>
          <div class="error-message"></div>
          <div class="text-center">
            <button
              type="submit"
              class="light">
              Записаться сейчас
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /Appointment Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php the_field('testi_title'); ?></h2>
      <p>
        <?php the_field('testi_subtitle'); ?>
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="25">
      <div
        class="swiper init-swiper"
        data-speed="600"
        data-delay="5000"
        data-breakpoints='{ "320": { "slidesPerView": 1, "spaceBetween": 40 }, "1200": { "slidesPerView": 3, "spaceBetween": 40 } }'>
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 3,
                "spaceBetween": 20
              }
            }
          }
        </script>
        <div class="swiper-wrapper">
          <?php
          // проверяем есть ли в повторителе данные
          if (have_rows('testi_rep')):
            // перебираем данные
            while (have_rows('testi_rep')) : the_row(); ?>

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span><?php the_sub_field('quote'); ?></span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                  <h3><?php the_sub_field('name'); ?></h3>
                  <h4><?php the_sub_field('age'); ?></h4>
                </div>
              </div>
          <?php
            endwhile;
          else :
          // вложенных полей не найдено
          endif;
          ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- /Testimonials Section -->

  <!-- Doctors Section -->
  <section id="doctors" class="doctors section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php the_field('doctors_title'); ?></h2>
      <p>
        <?php the_field('doctors_subtitle'); ?>
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container">
      <div class="row gy-4" style="justify-content: center">
        <?php
        // проверяем есть ли в повторителе данные
        if (have_rows('doctors')):
          // перебираем данные
          while (have_rows('doctors')) : the_row(); ?>

            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="20">
              <div class="team-member">
                <div class="member-img">
                  <img
                    src="<?php echo get_sub_field('image')['url']; ?>"
                    class="img-fluid"
                    alt="<?php echo get_sub_field('image')['alt']; ?>" />
                  <div class="social">
                    <!-- <a href=""><i class="bi bi-linkedin"></i></a> -->
                    <?php
                    // проверяем есть ли в повторителе данные
                    if (have_rows('socials')):
                      // перебираем данные
                      while (have_rows('socials')) : the_row(); ?>

                        <a href="<?php echo esc_url(get_sub_field('socials_link')['url']); ?>" target="<?php echo get_sub_field('socials_link')['target'] ?: '_self'; ?>">
                          <i class="bi bi-<?php echo strtolower(get_sub_field('socials_link')['title']); ?>"></i>
                        </a>

                    <?php
                      endwhile;
                    else :
                    // вложенных полей не найдено
                    endif;
                    ?>

                  </div>
                </div>
                <div class="member-info">
                  <h4><?php the_sub_field('name'); ?></h4>
                  <span><?php the_sub_field('description'); ?></span>
                </div>
              </div>
            </div>
            <!-- End Team Member -->

        <?php
          endwhile;
        else :
        // вложенных полей не найдено
        endif;
        ?>


      </div>
    </div>
  </section>
  <!-- /Doctors Section -->

  <!-- Gallery Section -->
  <section id="gallery" class="gallery section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php the_field('portfolio_title'); ?></h2>
      <p
        style="max-width: 600px; text-align: center; margin: 0 auto">
        <?php the_field('portfolio_subtitle'); ?>
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="25">
      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "centeredSlides": true,
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 0
              },
              "768": {
                "slidesPerView": 3,
                "spaceBetween": 20
              },
              "1200": {
                "slidesPerView": 5,
                "spaceBetween": 20
              }
            }
          }
        </script>
        <div class="swiper-wrapper align-items-center">

          <?php
          // проверяем есть ли в повторителе данные
          if (have_rows('portfolio_images')):
            // перебираем данные
            while (have_rows('portfolio_images')) : the_row(); ?>

              <div class="swiper-slide">
                <a
                  class="glightbox"
                  data-gallery="images-gallery"
                  href="<?php echo get_sub_field('image')['url']; ?>"><img
                    src="<?php echo get_sub_field('image')['url']; ?>"
                    class="img-fluid"
                    alt="<?php echo get_sub_field('image')['alt']; ?>" /></a>
              </div>

          <?php
            endwhile;
          else :
          // вложенных полей не найдено
          endif;
          ?>


        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- /Gallery Section -->

  <!-- Faq Section -->
  <section
    id="faq"
    class="faq section light-background"
    data-aos="fade-up"
    data-aos-delay="05">
    <!-- Section Title -->
    <div class="container section-title">
      <h2><?php the_field('faq_title'); ?></h2>
      <p>
        <?php the_field('faq_subtitle'); ?> </p>
    </div>
    <!-- End Section Title -->

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="faq-container">

            <?php
            // проверяем есть ли в повторителе данные
            if (have_rows('faq')):
              // перебираем данные
              while (have_rows('faq')) : the_row(); ?>


                <div class="faq-item">
                  <h3><?php the_sub_field('question'); ?></h3>
                  <div class="faq-content">
                    <p>
                      <?php the_sub_field('answer'); ?>
                    </p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <!-- End Faq item-->

            <?php
              endwhile;
            else :
            // вложенных полей не найдено
            endif;
            ?>

          </div>
        </div>
        <!-- End Faq Column-->
      </div>
    </div>
  </section>
  <!-- /Faq Section -->

  <!-- Contact Section -->
  <?php echo do_shortcode('[custom_contact_section]'); ?>
  <!-- /Contact Section -->
</main>

<?php
get_footer();
