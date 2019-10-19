<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PT. GREENTECH EQUIPMENT INDONESIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/owl.theme.default.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/jquery.fancybox.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/bootstrap-datepicker.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/fonts/flaticon/font/flaticon.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/aos.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/public/selling/css/style.css') ?>">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300"> 
  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>  
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">       
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="#" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="#" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="#" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="#" class=""><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">+62-713-3300596</span></a></span>
              <span><a href="#"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">greentechequipment@gmail.com</span></a></span>
            </p>
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">         
          <div class="col-6 col-xl-2">
          </div>
          <div class="col-12 col-md-12 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="<?php echo base_url('/#home-section') ?>" class="nav-link">Home</a></li>
                <li><a href="<?php echo base_url('/#services-section') ?>" class="nav-link">Services</a></li>
                <li><a href="<?php echo base_url('/#products-section') ?>" class="nav-link">Products</a></li>
                <li><a href="<?php echo base_url('/#purchase-section') ?>" class="nav-link">Purchase</a></li>
                <li><a href="<?php echo base_url('/#about-section') ?>" class="nav-link">About Us</a></li>
                <li><a href="<?php echo base_url('/#contact-section') ?>" class="nav-link">Contact Us</a></li>
                <li><a href="<?php echo base_url('/#fanspage-section') ?>" class="nav-link">Fanspage FB</a></li>
                <?php if (empty($this->session->userdata('username'))) { ?>           
                  <li><a href="<?php echo base_url('/admin') ?>" class="nav-link">Login</a></li>                           
                <?php }else{ ?>
                  <li><a href="<?php echo base_url('auth/logout') ?>" class="nav-link">Logout</a></li>                   
                  <li><a href="<?php echo base_url('welcome/pesan') ?>" class="nav-link">Pesan</a></li>                   
                <?php } ?>
                
              </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>     
    </header>


	<br><br><br>     
    <div class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h2 class="section-title mb-3">Message</h2>
			<h3 class="section-sub-title">Pesan balasan dari contact us</h3>
          </div>
        </div>
        <div class="row align-items-stretch">
			<?php foreach($contact_us as $row)
				{
			?>
              <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                <div class="unit-4 d-flex">
                  <!-- <div class="unit-4-icon mr-4"><span class="<?= $row['subject']; ?>"></span></div> -->
                  <div>                    
                    <h4>Subject : <?= $row['subject'] ?></h4>
                    <p>My Message : <?= $row['pesan'] ?></p>
                    <p>Reply Message : <?= $row['pesanreply'] ?></p>

                  </div>
                </div>
              </div>
          <?php  }
          ?>
        </div>
      </div>
    </div>

  
    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
              </div>
              <div class="col-md-3 ">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Products</a></li>
                  <li><a href="#">Purchase</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Fanspage FB</a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <script src="<?php echo base_url('assets/public/selling/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/jquery-migrate-3.0.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/jquery-ui.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/owl.carousel.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/jquery.stellar.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/jquery.countdown.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/jquery.easing.1.3.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/aos.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/jquery.fancybox.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/public/selling/js/jquery.sticky.js') ?>"></script>

  <script type="text/javascript" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5"></script>
  
  <script src="<?php echo base_url('assets/public/selling/js/main.js') ?>"></script>
    
  </body>
</html>