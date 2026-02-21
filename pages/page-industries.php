

<?php
/*
Template Name: Industries Page
*/
get_header();
?>
<main class="industries-main">
  <section class="industries-hero-section section">
    <div class="industries-hero home-hero container">
          <div class="hero-content">
            <span class="sub-head">
              CNC solutions designed for modern industries.
            </span>

            <h1 class="hero-head">
              Supporting Manufacturing Across Industries
            </h1>

            <p class="hero-text">Our CNC machines serve industries such as automotive, woodworking, electronics, engineering, and tooling. Built for precision and reliability, they support consistent performance in daily production.</p>


            <div class="hero-btns">
                <?php 
                // $text = 'Call Us Now';
                // $url = home_url('/contact');
                // $type = 'primary';
                // include get_template_directory() . '/components/button.php';
                // ?>

                <?php 
                // $text = 'View Our Products';
                // $url = home_url('/products');
                // $type = 'secondary';
                // include get_template_directory() . '/components/button.php';
                ?>
            </div>
          </div>
          <div class="hero-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/industries/industries-hero.webp" alt="">
          </div>
    </div>
  </section>
  <?php get_template_part('parts/industries'); ?>
</main>
<?php
get_footer();
?>