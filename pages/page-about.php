<?php
/*
Template Name: About Page
*/
get_header();
?>
<main class="about-main">

  <!-- about hero -->

      <section class="about-hero section">
        <div class="about-hero container">

          <div class="hero-content">
            <span class="sub-head">
              About Us
            </span>

            <h1 class="hero-head">
              Our Way of Working
            </h1>

            <p class="hero-text">Focused on precision, reliability, and long-<br>term performance.</p>


            <!-- <div class="hero-btns">
                <?php 
                // $text = 'Call Us Now';
                // $url = home_url('/contact');
                // $type = 'primary';
                // include get_template_directory() . '/components/button.php';
                ?>

                <?php 
                // $text = 'View Our Products';
                // $text = 'View Our Products';
                // $url = home_url('/products');
                // $type = 'secondary';
                // include get_template_directory() . '/components/button.php';
                ?>
            </div> -->

          </div>



          <div class="hero-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us/hero.webp" alt="">
          </div>

        </div>
      </section>



      <!-- <section class="stats-sections section">
        <div class="about-stats">

                <div class="stat stat-1">
                    <span class="stat-number">300+</span>
                    <span class="stat-label">Team Size</span>
                </div>

                <div class="stat stat-2">
                    <span class="stat-number">1500+</span>
                    <span class="stat-label">Total Sales</span>
                </div>
                
                <div class="stat stat-3">
                    <span class="stat-number">36</span>
                    <span class="stat-label">Selling Location</span>
                </div>
                
            </div>
      </section> -->

      <section class="why-us-section section">
        <div class="why-us-container container">
          <h2>Why Choose Us</h2>
           <div class="whyus-cards">
            
            <div class="main-card">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/why-us/production-ready.svg'; ?>" alt="" class="ind-icon">
              <h4>Production Ready</h4>
              <p>Each machine is fully assembled, tested, and validated before delivery to ensure smooth and immediate production startup.</p>
              <!-- <button class="ind-btn">
                Learn More
                <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/arrow.svg'; ?>" alt="">
              </button> -->
            </div>
          

            <div class="main-card">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/why-us/consistent-precision.svg'; ?>" alt="" class="ind-icon">
              <h4>Consistent Precision </h4>
              <p>Engineered to maintain accuracy over long cycles, multiple shifts, and varying production conditions.</p>
              <!-- <button class="ind-btn">
                Learn More
                <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/arrow.svg'; ?>" alt="">
              </button> -->
            </div>

            <div class="main-card">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/why-us/built-to-last.svg'; ?>" alt="" class="ind-icon">
              <h4>Built to Last</h4>
              <p>Heavy-duty construction and quality components ensure long service life in demanding shop-floor environments.</p>
              <!-- <button class="ind-btn">
                Learn More
                <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/arrow.svg'; ?>" alt="">
              </button> -->
            </div>

            <div class="main-card">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/why-us/practical-engineering.svg'; ?>" alt="" class="ind-icon">
              <h4>Practical Engineering</h4>
              <p>Designed with ease of operation, service access, and real-world usability in mind.</p>
              <!-- <button class="ind-btn">
                Learn More
                <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/arrow.svg'; ?>" alt="">
              </button> -->
            </div>

            <div class="main-card">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/why-us/reliable-performance.svg'; ?>" alt="" class="ind-icon">
              <h4>Reliable Performance</h4>
              <p>Stable machine behavior delivers predictable output and consistent machining results.</p>
              <!-- <button class="ind-btn">
                Learn More
                <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/arrow.svg'; ?>" alt="">
              </button> -->
            </div>

            <div class="main-card">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/why-us/low-downtime.svg'; ?>" alt="" class="ind-icon">
              <h4>Low Downtime</h4>
              <p>Robust systems and proven components help minimize stoppages and maintenance-related delays.</p>
              <!-- <button class="ind-btn">
                Learn More
                <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/arrow.svg'; ?>" alt="">
              </button> -->
            </div>


          </div>
        </div>
      </section>


      <!-- <section class="certificates section">
        <div class="certificates-container container">
          <span class="sub-head">Our Certificates</span>
          <h2>Standards We Are Certified For</h2>
          
          <div class="certificates-carousel-wrapper">
            <div class="certificates-carousel-track-container">
              <div class="certificates-carousel-track">
                
                <div class="certificates-carousel-card">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/about-us/certificate.webp'; ?>" alt="Certificate 1">
                </div>
                
                <div class="certificates-carousel-card">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/about-us/certificate.webp'; ?>" alt="Certificate 2">
                </div>
                
                <div class="certificates-carousel-card">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/about-us/certificate.webp'; ?>" alt="Certificate 3">
                </div>
                
                <div class="certificates-carousel-card">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/about-us/certificate.webp'; ?>" alt="Certificate 4">
                </div>
                
                <div class="certificates-carousel-card">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/about-us/certificate.webp'; ?>" alt="Certificate 5">
                </div>
                
                <div class="certificates-carousel-card">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/about-us/certificate.webp'; ?>" alt="Certificate 6">
                </div>
                
                <div class="certificates-carousel-card">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/about-us/certificate.webp'; ?>" alt="Certificate 7">
                </div>
                
              </div>
            </div>
          </div>
          
          <div class="carousel-controls">
            <button class="carousel-btn certificates-carousel-btn-prev" aria-label="Previous">
              Left
            </button>
            <button class="carousel-btn certificates-carousel-btn-next" aria-label="Next">
              Right
            </button>
          </div>
          
        </div>
      </section> -->

      <?php //include get_template_directory() . '/parts/cta.php'; ?>



</main>
<?php
get_footer();
?>