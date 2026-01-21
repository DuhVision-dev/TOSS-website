<?php
// Basic product archive fallback
get_header();
?>
<div class="container site-inner">
  <h1>Products</h1>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article><?php the_title('<h2>','</h2>'); the_excerpt(); ?></article>
  <?php endwhile; else: ?>
    <p>No products found.</p>
  <?php endif; ?>
</div>
<?php get_footer();
?>