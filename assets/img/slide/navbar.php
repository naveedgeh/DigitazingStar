<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
  <div class="container d-flex">
    <div class="contact-info mr-auto">
      <i class="icofont-envelope"></i><a href="mailto:suppot@digitizingstar.com">suppot@digitizingstar.com</a>
        <a href="/pricing-plans.php" class="twitter"><i class="icofont-bag phone-icon"> </i> Check Our Latest Priceing & plans</a>

    </div>
    <div class="social-links">
      <a href="/user/" class="twitter"><i class="icofont-login"> Login</i></a>
      <a href="/user/Register.php" class="facebook"><i class="icofont-user"> Register</i></a>
      <a href="" data-toggle="modal" data-target="#exampleModal" class="instagram"><i class="icofont-email"> Get Quote</i></a>

    </div>
  </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center">

    <div class="logo mr-auto">
      <!-- <h1 class="text-light"><a href="index.html">Digitizing<span>Stars</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="https://www.trandinggo.com/"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
    </div>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="<?php if($active_nav=='home'){echo 'active';} ?>"><a href="https://www.trandinggo.com/">Home</a></li>

        <li class="drop-down"><a href="#">Services</a>
          <ul>
            <li class="<?php if($active_nav=='emb'){echo 'active';} ?>" ><a href="/Embroidery-digitizing.php">Embroidery Digitizing</a></li>
            <li class="<?php if($active_nav=='vector'){echo 'active';} ?>"><a href="/vector-art.php">Vector art, raster to vectors</a></li>
            <li class="<?php if($active_nav=='dgt'){echo 'active';} ?>" ><a href="/dgt.php">DTG Direct to Garments</a></li>
            <li class="<?php if($active_nav=='clipping'){echo 'active';} ?>"><a href="/clipping.php">Clipping</a></li>
          </ul>
        </li>
        <li class="<?php if($active_nav=='price'){echo 'active';} ?>"><a href="/pricing-plans.php">Pricing & Plans</a></li>
        <li class="<?php if($active_nav=='contact'){echo 'active';} ?>" ><a href="/contact.php">Contact</a></li>

      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

<?php include('Quote.php') ?>
