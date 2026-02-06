<?php
// parts/featured-products.php — Products preview
?>
<section id="products" class="products-preview section">
  <div class="featured-products container">
    <h2>Featured Products</h2>
    <p>At TOSS, we design and manufacture CNC machines built for reliable daily production. Our working process focuses on precision engineering, quality manufacturing, and consistent performance across industries such as automotive, woodworking, electronics, and tooling. From machine design and assembly to testing and installation, every step is handled with attention to accuracy, durability, and long-term use. We work closely with manufacturers to deliver CNC solutions that support productivity, reduce downtime, and perform reliably in real factory environments.</p>
    
    <div class="carousel-wrapper">
      <div class="carousel-track-container">
        <div class="carousel-track">
          <div class="carousel-card">
            <div class="product-card-image">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/home/featured-products/router.webp'; ?>" alt="Routers Machines">
            </div>
            <div class="product-card-content">
              <h3 class="product-card-title">Routers Machines</h3>
              <?php $text = 'Learn More';
              $url = home_url('#');
              $type = 'primary';
              include get_template_directory() . '/components/button.php';
              ?>
            </div>
          </div>
          <div class="carousel-card">
            <div class="product-card-image">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/home/featured-products/co2-laser-machine.webp'; ?>" alt="Routers Machines">
            </div>
            <div class="product-card-content">
              <h3 class="product-card-title">Co2 Laser Machines</h3>
              <?php $text = 'Learn More';
              $url = home_url('#');
              $type = 'primary';
              include get_template_directory() . '/components/button.php';
              ?>
            </div>
          </div>
          <div class="carousel-card">
            <div class="product-card-image">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/home/featured-products/fiber-laser-machine.webp'; ?>" alt="Routers Machines">
            </div>
            <div class="product-card-content">
              <h3 class="product-card-title">Fiber Metal Laser Machine</h3>
              <?php $text = 'Learn More';
              $url = home_url('#');
              $type = 'primary';
              include get_template_directory() . '/components/button.php';
              ?>
            </div>
          </div>
          <div class="carousel-card">
            <div class="product-card-image">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/home/featured-products/chaneel-bending.webp'; ?>" alt="Routers Machines">
            </div>
            <div class="product-card-content">
              <h3 class="product-card-title">Channel Letter Bending Machine</h3>
              <?php $text = 'Learn More'; 
              $url = home_url('#');
              $type = 'primary'; 
              include get_template_directory() . '/components/button.php';
              ?>
          </div>
        </div>
      </div>
    </div>
    
    <div class="carousel-controls">
      <button class="carousel-btn carousel-btn-prev" aria-label="Previous">
        Left
      </button>
      <button class="carousel-btn carousel-btn-next" aria-label="Next">
        Right
      </button>
    </div>
    
  </div>
</section> 