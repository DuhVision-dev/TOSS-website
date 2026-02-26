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
          <div class="alt-mobile-dropdown-menu products-dropdown">
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="<?php echo esc_url(add_query_arg('product_cat', 'routers', home_url('/products'))); ?>" class="alt-mobile-link">Routers</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(add_query_arg('product_cat', 'wood-working', home_url('/products'))); ?>" class="alt-mobile-sub-link">Wood Working</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/wood-working-1325')); ?>" class="alt-mobile-sub-link">1325</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/wood-working-1530')); ?>" class="alt-mobile-sub-link">1530</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/wood-working-2030')); ?>" class="alt-mobile-sub-link">2030</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(add_query_arg('product_cat', 'stone-working', home_url('/products'))); ?>" class="alt-mobile-sub-link">Stone Working</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/stone-working-router-1325')); ?>" class="alt-mobile-sub-link">1325</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/stone-working-router-1530')); ?>" class="alt-mobile-sub-link">1530</a></li>
              </ul>
            </div>
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="<?php echo esc_url(add_query_arg('product_cat', 'co2-laser', home_url('/products'))); ?>" class="alt-mobile-link">CO2 Laser</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/co2-laser-1410')); ?>" class="alt-mobile-sub-link">1410</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/co2-laser-26')); ?>" class="alt-mobile-sub-link">1325</a></li>
                <!-- <li class="alt-sub-items"><a href="<//?php echo esc_url(home_url('/product/co2-laser-1530')); ?>" class="alt-mobile-sub-link">1530</a></li> -->
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
              <a href="<?php echo esc_url(add_query_arg('product_cat', 'fiber-metal-laser', home_url('/products'))); ?>" class="alt-mobile-link">Fiber Metal Cutting Machine</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/fiber-metal-laser-1530')); ?>" class="alt-mobile-sub-link">1530</a></li>
                <!-- <li class="alt-sub-items"><a href="<//?php echo esc_url(home_url('/product/fiber-metal-laser-2040')); ?>" class="alt-mobile-sub-link">2040</a></li> -->
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
              <a href="<?php echo esc_url(add_query_arg('product_cat', 'co2-marker', home_url('/products'))); ?>" class="alt-mobile-link">CO2 Marker</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/co2-marker-150-x-150')); ?>" class="alt-mobile-sub-link">150 × 150</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/co2-marker-200-x-200')); ?>" class="alt-mobile-sub-link">200 × 200</a></li>
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
               <a href="<?php echo esc_url(add_query_arg('product_cat', 'spot-welding', home_url('/products'))); ?>" class="alt-mobile-link">Spot Welding</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/spot-welding-300w')); ?>" class="alt-mobile-sub-link">300W</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/spot-welding-500w')); ?>" class="alt-mobile-sub-link">500W</a></li>
              </ul>
            <!-- Sub-nav-list -->
            </div><div class="alt-sub-nav">
              <a href="<?php echo esc_url(add_query_arg('product_cat', 'fiber-laser-welding', home_url('/products'))); ?>" class="alt-mobile-link">Fiber Laser Welding</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/fiber-laser-welding-1500w')); ?>" class="alt-mobile-sub-link">1500W</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/fiber-laser-welding-2000w')); ?>" class="alt-mobile-sub-link">2000W</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/fiber-laser-welding-3000w')); ?>" class="alt-mobile-sub-link">3000W</a></li>
              </ul>
            </div>
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="<?php echo esc_url(add_query_arg('product_cat', 'sheet-bending-machine', home_url('/products'))); ?>" class="alt-mobile-link">Sheet Bending Machine</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/sheet-bending-machine-100-tons')); ?>" class="alt-mobile-sub-link">100 Tons</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/sheet-bending-machine-160-tons')); ?>" class="alt-mobile-sub-link">160 Tons</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/sheet-bending-machine-200-tons')); ?>" class="alt-mobile-sub-link">200 Tons</a></li>
              </ul>
            </div>
            <!-- Sub-nav-list -->
            <div class="alt-sub-nav">
              <a href="<?php echo esc_url(add_query_arg('product_cat', 'channel-letter-bending', home_url('/products'))); ?>" class="alt-mobile-link">Channel Letter Bending</a>
              <ul class="alt-sub-nav-links">
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/aluminum-letter-bending')); ?>" class="alt-mobile-sub-link">Aluminum Letter Bending</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/ss-letter-aluminum')); ?>" class="alt-mobile-sub-link">SS Letter + Aluminum</a></li>
                <li class="alt-sub-items"><a href="<?php echo esc_url(home_url('/product/ss-aluminium-profile')); ?>" class="alt-mobile-sub-link">SS + Aluminum + Profile</a></li>
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
          <div class="alt-mobile-dropdown-menu industries-dropdown">
            <a href="<?php echo esc_url(home_url('/industries/automobile')); ?>" class="alt-mobile-link">Automobile</a>
            <a href="<?php echo esc_url(home_url('/industries/interior')); ?>" class="alt-mobile-link">Interior</a>
            <a href="<?php echo esc_url(home_url('/industries/engineering')); ?>" class="alt-mobile-link">Engineering</a>
            <!-- <a href="<?php echo esc_url(home_url('/industries/manufacturing')); ?>" class="alt-mobile-link">Manufacturing</a> -->
            <!-- <a href="<?php echo esc_url(home_url('/industries/electronics')); ?>" class="alt-mobile-link">Electronics</a> -->
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
            <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'routers', home_url('/products'))); ?>">Routers</a></h4>
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
                      <li><a href="<?php echo esc_url(home_url('/product/wood-working-1325')); ?>">1325</a></li>
                      <li><a href="<?php echo esc_url(home_url('/product/wood-working-1530')); ?>">1530</a></li>
                      <li><a href="<?php echo esc_url(home_url('/product/wood-working-2030')); ?>">2030</a></li>
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
                      <li><a href="<?php echo esc_url(home_url('/product/stone-working-router-1325')); ?>">1325</a></li>
                      <li><a href="<?php echo esc_url(home_url('/product/stone-working-router-1530')); ?>">1530</a></li>
                    </ul>
                  </li>

                  <!-- Item 3 -->
                  <!-- <li class="accordion-item">
                    <button class="accordion-trigger">
                      4-Axis
                      <span class="accordion-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/dropdown-icon.svg" alt="">
                      </span>
                    </button>
                    <ul class="accordion-panel">
                      <li><a href="<//?php echo esc_url(home_url('/product/4-axis-router-1530')); ?>">1530</a></li>
                      <li><a href="<//?php echo esc_url(home_url('/product/4-axis-1550')); ?>">1550</a></li>
                    </ul>
                  </li> -->

                  <!-- <li><a href="<//?php echo esc_url(home_url('/product/5-axis-router')); ?>">5-Axis Router</a></li> -->

            </ul>

            <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'spot-welding', home_url('/products'))); ?>">Spot Welding</a></h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product/spot-welding-300w')); ?>">300W</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/spot-welding-500w')); ?>">500W</a></li>
          </ul>
        </div>

        <div class="mega-col">
          <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'co2-laser', home_url('/products'))); ?>">CO2 Laser</a></h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product/co2-laser-1410')); ?>">1410</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/co2-laser-26')); ?>">1325</a></li>
            <!-- <li><a href="<//?php echo esc_url(home_url('/product/co2-laser-1530')); ?>">1530</a></li> -->
          </ul>

          <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'co2-marker', home_url('/products'))); ?>">CO2 Marker</a></h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product/co2-marker-150-x-150')); ?>">150 × 150</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/co2-marker-200-x-200')); ?>">200 × 200</a></li>
          </ul>

          <!-- <h4><a href="<//?php echo esc_url(add_query_arg('product_cat', 'spot-welding', home_url('/products'))); ?>">Spot Welding</a></h4>
          <ul>
            <li><a href="<//?php echo esc_url(home_url('/product/spot-welding-300w')); ?>">300W</a></li>
            <li><a href="<//?php echo esc_url(home_url('/product/spot-welding-500w')); ?>">500W</a></li>
          </ul> -->
        </div>

        <div class="mega-col">
          <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'fiber-metal-laser', home_url('/products'))); ?>">Fiber Metal Cutting Machine</a></h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product/fiber-metal-laser-1530')); ?>">1530</a></li>
            <!-- <li><a href="<//?php echo esc_url(home_url('/product/fiber-metal-laser-2040')); ?>">2040</a></li> -->
          </ul>

          <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'fiber-laser-welding', home_url('/products'))); ?>">Fiber Laser Welding</a></h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product/fiber-laser-welding-1500w')); ?>">1500W</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/fiber-laser-welding-2000w')); ?>">2000W</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/fiber-laser-welding-3000w')); ?>">3000W</a></li>
          </ul>
        </div>

        <div class="mega-col">
          <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'channel-letter-bending', home_url('/products'))); ?>">Channel Letter Bending</a></h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product/aluminum-letter-bending')); ?>">Aluminum</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/ss-letter-aluminum')); ?>">SS + Aluminum</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/ss-aluminium-profile')); ?>">SS + Aluminum + Profile</a></li>
          </ul>

          <h4><a href="<?php echo esc_url(add_query_arg('product_cat', 'sheet-bending-machine', home_url('/products'))); ?>">Sheet Bending Machine</a></h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product/sheet-bending-machine-100-tons')); ?>">100 Tons</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/sheet-bending-machine-160-tons')); ?>">160 Tons</a></li>
            <li><a href="<?php echo esc_url(home_url('/product/sheet-bending-machine-200-tons')); ?>">200 Tons</a></li>
          </ul>
        </div>
    </div>
  </div>

      <div class="nav-item has-dropdown " >

        <a href="<?php echo esc_url(home_url('/industries')); ?>" class="nav-link">
          Industries
        </a>

        <!-- SIMPLE DROPDOWN -->
        <div class="dropdown simple-menu">
          <a href="<?php echo esc_url(home_url('/industries/automobile')); ?>">Automobile</a>
          <a href="<?php echo esc_url(home_url('/industries/interior')); ?>">Interior</a>
          <a href="<?php echo esc_url(home_url('/industries/engineering')); ?>">Engineering</a>
          <!-- <a href="<?php echo esc_url(home_url('/industries/manufacturing')); ?>">Manufacturing</a> -->
          <!-- <a href="<?php echo esc_url(home_url('/industries/electronics')); ?>">Electronics</a> -->
          <a href="<?php echo esc_url(home_url('/industries/tooling')); ?>">Tooling</a>
        </div>

      </div>

      <div class="nav-item"><a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-link">Contact</a></div>
    </nav>

    <div class="nav-btns">
      
    <?php
    $text = 'Call Us At +91 8851471671';
    $url = home_url('/contact');
    $type = 'primary';
    include get_template_directory() . '/components/button.php';
    ?>


        
    </div>    

  </div>
</header>