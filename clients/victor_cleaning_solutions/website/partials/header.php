		<!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html"><img src="images/victor_logos/logo_clean_full.png" alt="Victor Cleaning Solutions Logo" style="max-width: 180px; height: auto;"></span></a>
          
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="portfolio.php" class="nav-link">Gallery</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav> -->



<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">

    <a class="navbar-brand" href="index.php">
      <img src="images/victor_logos/logo_clean_full.png" 
           alt="Victor Cleaning Solutions Logo"
           style="max-width: 180px; height: auto;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item <?= ($currentPage == 'index.php') ? 'active' : '' ?>">
          <a href="index.php" class="nav-link">Home</a>
        </li>

        <li class="nav-item <?= ($currentPage == 'services.php') ? 'active' : '' ?>">
          <a href="services.php" class="nav-link">Services</a>
        </li>

        <li class="nav-item <?= ($currentPage == 'about.php') ? 'active' : '' ?>">
          <a href="about.php" class="nav-link">About</a>
        </li>

        <li class="nav-item <?= ($currentPage == 'portfolio.php') ? 'active' : '' ?>">
          <a href="portfolio.php" class="nav-link">Gallery</a>
        </li>

        <li class="nav-item <?= ($currentPage == 'contact.php') ? 'active' : '' ?>">
          <a href="contact.php" class="nav-link">Contact</a>
        </li>

      </ul>
    </div>
  </div>
</nav>