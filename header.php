<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
  <div class="header-inner ">

    <!-- New Navigation for Mobile -->
    <nav class="alt-mobile-nav">
      <div class="alt-mobile-nav-list">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="alt-mobile-link alt-mobile-nav-head">Home</a>
        <a href="<?php echo esc_url(home_url('/about')); ?>" class="alt-mobile-link alt-mobile-nav-head">About Us</a>
        
        


        <!-- Product Sub nav starts here -->
        
        

        
        <div class="alt-mobile-dropdown">
          <button class="alt-mobile-link alt-mobile-nav-head alt-mobile-dropdown-toggle">Products
            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/dropdown-icon.svg" alt="">
          </button>  
          <div class="alt-mobile-dropdown-menu">
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="#" class="alt-mobile-link">Routers</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">Wood Working</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">Stone Working</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">4-Axis</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">5-Axis</a></li>
              </ul>
            </div>
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="#" class="alt-mobile-link">Co2 Laser</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">1410</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">1325</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">1530</a></li>
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
              <a href="#" class="alt-mobile-link">Fiber Metal Laser</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">1530</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">2040</a></li>
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
              <a href="#" class="alt-mobile-link">CO2 Marker</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">150 × 150</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">200 × 200</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">300 × 300</a></li>
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
               <a href="#" class="alt-mobile-link">Spot Welding</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">300W</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">500W</a></li>
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
              <a href="#" class="alt-mobile-link">Fiber Laser Welding</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">1500W</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">2000W</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">3000W</a></li>
              </ul>
            </div>
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="#" class="alt-mobile-link">Sheet Bending Machine</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">100 Tons</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">160 Tons</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">200 Tons</a></li>
              </ul>
            </div>
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="#" class="alt-mobile-link">Channel Letter Bending</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">Aluminum Letter Bending</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">SS Letter + Aluminum</a></li>
                <li class="alt-sub-items"><a href="#" class="alt-mobile-sub-link">SS + Aluminum + Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
        
        
        
        
        
        <!-- Product Sub nav ends here -->
        
        
      
        
        
        
        
        
        <!-- Industries Sub nav starts here -->
        
        
        <div class="alt-mobile-dropdown">
          <button class="alt-mobile-link alt-mobile-nav-head alt-mobile-dropdown-toggle">Industries
            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/icons/dropdown-icon.svg" alt="">
          </button>
          <div class="alt-mobile-dropdown-menu">
            <a href="<?php echo esc_url(home_url('/industries/automobile')); ?>" class="alt-mobile-link">Automobile</a>
            <a href="<?php echo esc_url(home_url('/industries/interior')); ?>" class="alt-mobile-link">Interior</a>
            <a href="<?php echo esc_url(home_url('/industries/engineering')); ?>" class="alt-mobile-link">Engineering</a>
            <a href="<?php echo esc_url(home_url('/industries/manufacturing')); ?>" class="alt-mobile-link">Manufacturing</a>
            <a href="<?php echo esc_url(home_url('/industries/electronics')); ?>" class="alt-mobile-link">Electronics</a>
            <a href="<?php echo esc_url(home_url('/industries/tooling')); ?>" class="alt-mobile-link">Tooling</a>
          </div>
        </div>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="alt-mobile-link alt-mobile-nav-head">Contact</a>
      </div>
<div class="alt-mobile-nav-divider"></div>

    </nav>



      <!-- Industries Sub nav ends here -->





    
    
    
    <!-- Logo -->
   




    <div class="logo" >
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/toss_logo.svg" alt="The One Stop Solution Logo" >
      </a>
    </div>





    
    
    
    <!-- Menu Toggle Button -->





    <button class="menu-toggle" aria-label="Toggle menu">
      Menu
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/menu.svg" alt="Menu">
    </button>

    
    
    
    
    
    <!-- Main Navigation -->





    <nav class="main-nav nav-menu">
      
      <div class="nav-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">Home</a></div>
      <div class="nav-item"><a href="<?php echo esc_url(home_url('/about')); ?>" class="nav-link">About Us</a></div>
      <div class="nav-item has-dropdown">

      <a href="<?php echo esc_url(home_url('/products')); ?>" class="nav-link">Products</a>

    <!-- PRODUCTS MEGA MENU -->
    <div class="dropdown mega-menu">
        <div class="mega-col">
            <h4>Router</h4>
              <ul class="submenu accordion">

                  <!-- Item 1 -->
                  <li class="accordion-item">
                    <button class="accordion-trigger">
                      Wood Working
                      <span class="accordion-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/dropdown-icon.svg" alt="">
                      </span>
                    </button>
                    <ul class="accordion-panel">
                      <li><a href="#">1325</a></li>
                      <li><a href="#">1530</a></li>
                      <li><a href="#">1560</a></li>
                    </ul>
                  </li>

                  <!-- Item 2 -->
                  <li class="accordion-item">
                    <button class="accordion-trigger">
                      Stone Working
                      <span class="accordion-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/dropdown-icon.svg" alt="">
                      </span>
                    </button>
                    <ul class="accordion-panel">
                      <li><a href="#">1325</a></li>
                      <li><a href="#">1530</a></li>
                      <li><a href="#">1560</a></li>
                    </ul>
                  </li>

                  <!-- Item 3 -->
                  <li class="accordion-item">
                    <button class="accordion-trigger">
                      4-Axis
                      <span class="accordion-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/dropdown-icon.svg" alt="">
                      </span>
                    </button>
                    <ul class="accordion-panel">
                      <li><a href="#">1530</a></li>
                      <li><a href="#">1550</a></li>
                    </ul>
                  </li>

                  <li><a href="#">5-Axis</a></li>

            </ul>

            <h4>Stone Working</h4>
            <ul>
              <li><a href="#">1325</a></li>
              <li><a href="#">1530</a></li>
              <li><a href="#">1560</a></li>
            </ul>
        </div>

        <div class="mega-col">
          <h4>CO2 Laser</h4>
          <ul>
            <li><a href="#">1410</a></li>
            <li><a href="#">1325</a></li>
            <li><a href="#">1530</a></li>
          </ul>

          <h4>Spot Welding</h4>
          <ul>
            <li><a href="#">300W</a></li>
            <li><a href="#">500W</a></li>
          </ul>
        </div>

        <div class="mega-col">
          <h4>Fiber Metal Laser</h4>
          <ul>
            <li><a href="#">1530</a></li>
            <li><a href="#">2040</a></li>
          </ul>

          <h4>Fiber Laser Welding</h4>
          <ul>
            <li><a href="#">1500W</a></li>
            <li><a href="#">2000W</a></li>
            <li><a href="#">3000W</a></li>
          </ul>
        </div>

        <div class="mega-col">
          <h4>Channel Letter Bending</h4>
          <ul>
            <li><a href="#">Aluminum</a></li>
            <li><a href="#">SS + Aluminum</a></li>
          </ul>

          <h4>Sheet Bending Machine</h4>
          <ul>
            <li><a href="#">100 Tons</a></li>
            <li><a href="#">160 Tons</a></li>
            <li><a href="#">200 Tons</a></li>
          </ul>
        </div>
    </div>
  </div>

      <div class="nav-item has-dropdown" >

        <a href="<?php echo esc_url(home_url('#')); ?>" class="nav-link">
          Industries
        </a>

        <!-- SIMPLE DROPDOWN -->
        <div class="dropdown simple-menu">
          <a href="<?php echo esc_url(home_url('/industries/automobile')); ?>">Automobile</a>
          <a href="<?php echo esc_url(home_url('/industries/interior')); ?>">Interior</a>
          <a href="<?php echo esc_url(home_url('/industries/engineering')); ?>">Engineering</a>
          <a href="<?php echo esc_url(home_url('/industries/manufacturing')); ?>">Manufacturing</a>
          <a href="<?php echo esc_url(home_url('/industries/electronics')); ?>">Electronics</a>
          <a href="<?php echo esc_url(home_url('/industries/tooling')); ?>">Tooling</a>
        </div>

      </div>

      <div class="nav-item"><a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-link">Contact</a></div>
    </nav>

    <div class="nav-btns">
      
    <?php
    $text = 'Call Us Now';
    $url = home_url('/contact');
    $type = 'primary';
    include get_template_directory() . '/components/button.php';
    ?>


        
    </div>    

  </div>
</header>