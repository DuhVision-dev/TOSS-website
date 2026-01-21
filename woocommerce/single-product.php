<?php
// Basic single product fallback — copy of header/footer around WooCommerce content
get_header();
if ( function_exists('woocommerce_content') ) {
  woocommerce_content();
} else {
  echo '<div class="container"><p>WooCommerce content placeholder.</p></div>';
}
get_footer();
?>