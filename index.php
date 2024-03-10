<?php
require 'header.php';
//banar
$select_banner = "SELECT * FROM banners";
$banner_result = mysqli_query($db_connection, $select_banner);
$assoc_banner = mysqli_fetch_assoc($banner_result);

//expertise
$select_expertise = "SELECT * FROM expertises WHERE STATUS='1'";
$expertise_result = mysqli_query($db_connection, $select_expertise);

//services
$select_services = "SELECT * FROM services WHERE STATUS='1'";
$service_result = mysqli_query($db_connection, $select_services);

//portfolio
$select_portfolio = "SELECT * FROM portfolios";
$portfolio_result = mysqli_query($db_connection, $select_portfolio);
?>
<!-- Banner start  -->

<!-- Slider Start -->
<section class="slider py-7 ">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 col-sm-12 col-12 col-md-5">
        <div class="slider-img position-relative">
          <img height="100" src="uplodes/banner/<?= $assoc_banner['b_img'] ?>" alt="" class="img-fluid w-100">
        </div>
      </div>

      <div class="col-lg-6 col-12 col-md-7">
        <div class="ml-5 position-relative mt-5 mt-lg-0">
          <span class="head-trans"><?= $assoc_banner['watermark'] ?></span>
          <h1 class="font-weight-normal text-color text-md"><i class="ti-minus mr-2"></i><?= $assoc_banner['deg'] ?>
          </h1>
          <h2 class="mt-3 text-lg mb-3 text-capitalize"><?= $assoc_banner['name'] ?></h2>
          <p class="animated fadeInUp lead mt-4 mb-5 text-white-50 lh-35"><?= $assoc_banner['description'] ?></p>
          <a target="_blank" href="<?= $assoc_banner['a_link'] ?>" class="btn btn-solid-border"><?= $assoc_banner['a_button'] ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Banner End -->

<!-- Skills start -->
<section class="section bg-gray" id="skillbar" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>Skills
            Set</span>
          <h2 class="title">Expertise</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($expertise_result as $espertise) { ?>
        <div class="col-lg-6 col-md-6">
          <div class="skill-bar mb-4 mb-lg-0">
            <div class="mb-4 text-right">
              <h4 class="font-weight-normal"><?= $espertise['name'] ?></h4>
            </div>
            <div class="progress">
              <div class="progress-bar" data-percent="<?= $espertise['persent'] ?>">
                <span class="percent-text"><span class="count"><?= $espertise['persent'] ?></span>%</span>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Skills End -->

<!-- Service start -->
<section class="section bg-gray" id="service" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>What i
            do</span>
          <h2 class="title">Services</h2>
        </div>
      </div>
    </div>

    <div class="row no-gutters">
      <?php foreach ($service_result as $secvice) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="card p-5 rounded-0">
            <h3 class="my-4 text-capitalize"><?= $secvice['name'] ?></h3>
            <p><?= $secvice['description'] ?></p>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="row align-items-center mt-5" data-aos="fade-up">
      <div class="col-lg-6 mt-5">
        <h2 class="mb-5 text-lg-2 text-white-50">Let's <span class="text-white">work together</span> on your next
          project </h2>
      </div>
      <div class="col-lg-4 ml-auto text-right">
        <a href="#contact" class="btn btn-main text-white smoth-scroll">Hire Me</a>
      </div>
    </div>
  </div>
</section>
<!-- Service End -->

<!-- Portfolio start -->
<section class="section" id="portfolio" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus"></i>works</span>
          <h2 class="title">Portfolio</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="post_gallery owl-carousel owl-theme">
        <?php foreach ($portfolio_result as $portfolio) { ?>
          <div class="item">
            <div class="portfolio-item position-relative">
              <img src="../project/uplodes/portfolio/<?= $portfolio['img'] ?>" alt="image" class="img-fluid" style="height:250px;">

              <div class="portoflio-item-overlay">
                <a href="portfolio-single.html"><i class="ti-plus"></i></a>
              </div>
            </div>
            <div class="text mt-3">
              <h4 class="mb-1 text-capitalize"><?= $portfolio['title'] ?></h4>
              <p class="text-uppercase letter-spacing text-sm"><?= $portfolio['subtitle'] ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- Portfolio End -->

<!-- Tetsimonial start -->
<section id="testimonial" class="section testomionial" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="section-title">
          <span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>testimonial</span>
          <h1 class="title">What People Say About me</h1>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="testimonial-slider">
          <div class="testimonial-item position-relative">
            <i class="ti-quote-left text-white-50"></i>
            <div class="testimonial-content">
              <p class="text-md mt-3">They do this through collaboration between our strategists, designers and
                technologists.They craft beautiful and unique digital experiences.Unlimited power and customization
                possibilities.Pixel perfect design & clear code delivered to you.</p>

              <div class="media mt-5 align-items-center">
                <img src="images/about/2.jpg" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
                <div class="media-body">
                  <h3 class="mb-0">John Smith</h3>
                  <span class="text-muted">Creative Designer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-item position-relative">
            <i class="ti-quote-left text-white-50"></i>
            <div class="testimonial-content">
              <p class="text-md mt-3">They do this through collaboration between our strategists, designers and
                technologists.They craft beautiful and unique digital experiences.Unlimited power and customization
                possibilities.Pixel perfect design & clear code delivered to you.</p>

              <div class="media mt-5 align-items-center">
                <img src="images/about/3.jpg" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
                <div class="media-body">
                  <h3 class="mb-0">Smith Austin</h3>
                  <span class="text-muted">Developer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-item position-relative">
            <i class="ti-quote-left text-white-50"></i>
            <div class="testimonial-content">
              <p class="text-md mt-3">They do this through collaboration between our strategists, designers and
                technologists.They craft beautiful and unique digital experiences.Unlimited power and customization
                possibilities.Pixel perfect design & clear code delivered to you.</p>

              <div class="media mt-5 align-items-center">
                <img src="images/about/3.jpg" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
                <div class="media-body">
                  <h3 class="mb-0">Mike jack</h3>
                  <span class="text-muted">Marketer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Tetsimonial End -->

<!-- Contact start -->
<section class="section" id="contact" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>Contact</span>
          <h1 class="title">Get in Touch</h1>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <form class="contact__form form-row contact-form" method="post" action="./inbox/message.php" id="contactForm">
          <div class="form-group col-lg-6">
            <?php if (isset($_SESSION['name_err'])) { ?>
              <strong class="text-danger"><?= $_SESSION['name_err'] ?></strong>
            <?php }
            unset($_SESSION['name_err']) ?>
          </div>
          <div class="form-group col-lg-6">
            <?php if (isset($_SESSION['email_err'])) { ?>
              <strong class="text-danger"><?= $_SESSION['email_err'] ?></strong>
            <?php }
            unset($_SESSION['email_err']) ?>

          </div>

          <div class="form-group col-lg-6 mb-5">
            <input type="text" id="name" name="name" class="form-control bg-transparent" placeholder="Your Name">

          </div>
          <div class="form-group col-lg-6 mb-5">
            <input type="text" name="email" id="email" class="form-control bg-transparent" placeholder="Your Email">
          </div>
          <div class="form-group col-lg-12 mb-5">
            <input type="text" name="subject" id="subject" class="form-control bg-transparent" placeholder="Your Subject">
          </div>

          <div class="form-group col-lg-12 mb-5">
            <textarea id="message" name="message" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Message"></textarea>

            <div class="text-center">
              <input class="btn btn-main text-white mt-5" id="submit" name="submit" type="submit" class="btn btn-hero" value="Send Message">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Contact End -->

<?php
require 'footer.php'
?>
<?php if (isset($_SESSION['sent'])) { ?>
  <script>
    Swal.fire({
      // position: "top-end",
      icon: "success",
      title: "<?= $_SESSION['sent'] ?>",
      showConfirmButton: false,
      timer: 1500
    });
  </script>
<?php }
unset($_SESSION['sent']) ?>