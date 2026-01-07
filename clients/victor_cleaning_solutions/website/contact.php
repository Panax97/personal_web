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
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/fotos_victor/contact_photo.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Contact</h1>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="wrapper">
							<div class="row mb-5">
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Address:</span> Boston,Massachusetts</p>
					          </div>
				          </div>
								</div>
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Phone:</span> <a href="tel://1234567920">(617)3194396 or (857)2932168</a></p>
					          </div>
				          </div>
								</div>
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Email:</span> <a href="mailto:info@victorscleaningsolutions.com">info@victorscleaningsolutions.com</a></p>
					          </div>
				          </div>
								</div>
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Website</span> <a href="#">victorscleaningsolutions.com</a></p>
					          </div>
				          </div>
								</div>
							</div>


							<!-- Inicio Contact Form -->

							<div class="row no-gutters">
								<div class="col-md-7">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<h3 class="mb-4">Contact Us</h3>
								<div id="form-message-warning" class="mb-4"></div> 
<div id="form-message-success" class="mb-4" style="display:none;">
  Your message was sent, thank you!
</div>
										<form method="POST" action="send-email.php" id="contactForm" name="contactForm" class="contactForm">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="name">Full Name</label>
														<input type="text" class="form-control" name="name" id="name" placeholder="Name">
													</div>
												</div>
												<div class="col-md-6"> 
													<div class="form-group">
														<label class="label" for="email">Email Address</label>
														<input type="email" class="form-control" name="email" id="email" placeholder="Email">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="subject">Subject</label>
														<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="#">Message</label>
														<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<!-- <input type="submit" value="Send Message" class="btn btn-primary"> -->

														<a href="under-development.php" class="btn btn-primary">Send Message </a>
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-5 d-flex align-items-stretch">
									<div class="info-wrap w-100 p-5 img" style="background-image: url(images/fotos_victor/victor_owner3.png);">
				          </div>


						  
								</div>
							</div>
						</div>
					</div>

<!-- Fin Contact Form -->



							<!-- Inicio Mapas -->

		<div class="col-md-12">

		<div class="row justify-content-center mb-5">
  <div class="col-md-10 text-center">
    <h2 class="mb-3" style="font-weight:700;">
      Cleaning Services in Boston, Massachusetts and Surrounding Areas
    </h2>
    <div style="width:50%; max-width:420px; height:4px; background:#2f9cf0; margin:12px auto 0;"></div>
  </div>
</div>

  <div class="col-md-12">
  <iframe
    src="https://www.google.com/maps?q=Boston,MA&z=12&output=embed"
    width="100%"
    height="450"
    style="border:0;"
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>


</div>

	<!-- FIN Mapas -->



				</div>
			</div>
		</section>


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