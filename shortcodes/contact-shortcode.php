<?php
function custom_contact_section()
{
  ob_start();
?>
  <!-- Contact Section -->
  <section id="contact" class="contact section" data-aos="fade-up" data-aos-delay="25">
    <!-- Section Title -->
    <div class="container section-title">
      <h2>Контакты</h2>
      <p>Мы всегда рады помочь Вашей улыбке!</p>
    </div>
    <!-- End Section Title -->

    <div class="mb-5">
      <iframe style="border: 0; width: 100%; height: 370px"
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1158.7775335431804!2d24.00296569439369!3d56.948389384120205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slv!4v1742445139054!5m2!1sen!2slv"
        frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End Google Maps -->

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6">
          <div class="row gy-4">
            <div class="col-lg-12">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-geo-alt"></i>
                <h3>Адрес</h3>
                <p>Рига, Золитуде</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-telephone"></i>
                <h3>Позвони Нам</h3>
                <a href="tel:+37125142604">+371 25 142 604</a>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-envelope"></i>
                <h3>Напиши Письмо</h3>
                <a href="mailto:+37125142604">example@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" class="php-email-form">
            <div class="row gy-4">
              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Ваше Имя" required="" />
              </div>

              <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Вам Email" required="" />
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Тема" required="" />
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="4" placeholder="Сообщение" required=""></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Загрузка</div>
                <div class="error-message"></div>
                <div class="sent-message">
                  Ваше сообщение отправлено. Спасибо!
                </div>

                <button type="submit" class="light">Отправить сообщение</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /Contact Section -->
<?php
  return ob_get_clean();
}
