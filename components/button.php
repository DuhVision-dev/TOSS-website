<?php
/**
 * Button component
 * Expects:
 * $text
 * $url
 * $type (primary | secondary)
 */

$type = $type ?? 'primary';
?>

<a
  href="<?php echo esc_url($url); ?>"
  class="btn btn-<?php echo esc_attr($type); ?>"
>
  <?php echo esc_html($text); ?>
</a>
