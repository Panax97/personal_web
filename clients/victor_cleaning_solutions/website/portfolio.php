<!DOCTYPE html>
<html lang="en">
  	<!-- Inicio Header -->
   <?php include __DIR__ . '/partials/head.php'; ?>
   <!-- Final Header -->
  <body>
	<!-- Inicio WRAP -->
  	     <?php include __DIR__ . '/partials/advertising_bar.php'; ?>
	<!-- END WRAP -->
		<!-- Inicio nav -->

         <?php include __DIR__ . '/partials/header.php'; ?>

    
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/fotos_victor/galery_photo.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Portfolio <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Portfolio</h1>
          </div>
        </div>
      </div>
    </section>


    <!-- inicio auto Gallery -->
<!-- Inicio Gallery -->
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Our Project</span>
        <h2>Our Latest Cleaning Projects</h2>
      </div>
    </div>

    <div class="row">
      <?php
        $galleryDir = __DIR__ . '/images/fotos_victor/portfolio';
        $galleryUrl = '/images/fotos_victor/portfolio';
        $allowedExt = ['jpg','jpeg','png','webp'];

        $files = [];
        if (is_dir($galleryDir)) {
          foreach (scandir($galleryDir) as $f) {
            if ($f === '.' || $f === '..') continue;
            $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
            if (in_array($ext, $allowedExt, true)) {
              $files[] = $f;
            }
          }
        }

        natsort($files);
        $files = array_values($files);

        foreach ($files as $file):
          $img = $galleryUrl . '/' . rawurlencode($file);
      ?>
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="work img d-flex align-items-center"
               style="background-image: url('<?= htmlspecialchars($img) ?>');">
            
            <!-- Botón expandir -->
            <a href="<?= htmlspecialchars($img) ?>"
               class="icon image-popup d-flex justify-content-center align-items-center">
              <span class="fa fa-expand"></span>
            </a>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- Fin Gallery -->

    <!-- END auto Gallery -->

<!-- Inicio Footer -->
       
	<?php include __DIR__ . '/partials/footer.php'; ?>

	<!-- END Footer -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    

  <a href="contact.php" class="book-now-float" aria-label="Book Now">
  <span class="fa fa-calendar"></span> Get Your Free Estimate!

  
  </body>
</html>