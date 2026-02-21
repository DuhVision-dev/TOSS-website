<?php
/*
Template Name: Home Page
*/
get_header();
?>
<main class="home-main">


<?php get_template_part('parts/hero'); ?>
<?php get_template_part('parts/about-us'); ?>
<?php get_template_part('parts/featured-products'); ?>

<?php //get_template_part('parts/delivery-process'); ?>
<?php get_template_part('parts/faq'); ?>
<?php get_template_part('parts/cta'); ?>

</main>

<?php
get_footer();
?>