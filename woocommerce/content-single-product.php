<?php
/**
 * The template for displaying product content in the single-product.php template
 */

defined( 'ABSPATH' ) || exit;

echo '<!-- TEMPLATE LOADED: content-single-product.php -->';

global $product;

/**
 * Hook: woocommerce_before_single_product.
 */
do_action( 'woocommerce_before_single_product' );

if ( ! $product ) {
	echo '<p>Product object not found!</p>';
	return;
}


// echo '<h1> ' . get_the_title() . '</h1>';
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<!-- ============================================
		 SECTION 1: PRODUCT HERO
		 ============================================ -->
	<section class="product-hero">
		<div class="container">
			<div class="product-hero-grid">
				
				<!-- LEFT: Product Gallery -->
				<div class="product-gallery">
					
					<!-- Main Product Image -->
					<div class="product-gallery-main">
						<?php
						$thumbnail_id = get_post_thumbnail_id();
						if ($thumbnail_id) {
							echo wp_get_attachment_image($thumbnail_id, 'large', false, array('class' => 'main-product-image', 'id' => 'main-product-image'));
						} else {
							echo '<img src="' . esc_url(wc_placeholder_img_src('large')) . '" alt="' . esc_attr(get_the_title()) . '" class="main-product-image" />';
						}
						?>
					</div>
					
					<!-- Product Thumbnails Gallery -->
					<div class="product-gallery-thumbnails">
						<?php
						// Get product gallery images
						$gallery_image_ids = $product->get_gallery_image_ids();
						
						// Add featured image as first thumbnail
						if ($thumbnail_id) {
							$large_image_url = wp_get_attachment_image_url($thumbnail_id, 'large');
							echo '<div class="thumbnail-item active" data-large-image="' . esc_url($large_image_url) . '">';
							echo wp_get_attachment_image($thumbnail_id, 'thumbnail', false, array('class' => 'thumbnail-image'));
							echo '</div>';
						}
						
						// Add gallery images as thumbnails
						if ($gallery_image_ids) {
							foreach ($gallery_image_ids as $gallery_image_id) {
								$large_image_url = wp_get_attachment_image_url($gallery_image_id, 'large');
								echo '<div class="thumbnail-item" data-large-image="' . esc_url($large_image_url) . '">';
								echo wp_get_attachment_image($gallery_image_id, 'thumbnail', false, array('class' => 'thumbnail-image'));
								echo '</div>';
							}
						}
						?>
					</div>
					
				</div>
				
				<!-- RIGHT: Product Info -->
				<div class="product-info">
					
					<!-- Product Title -->
					<h1 class="product-title"><?php the_title(); ?></h1>
					
					<!-- Short Description -->
					<div class="product-short-description">
						<?php
						$short_description = $product->get_short_description();
						if ($short_description) {
							echo wpautop($short_description);
						} else {
							echo '<p>High-quality industrial machine designed for precision and durability.</p>';
						}
						?>
					</div>
					
					<!-- CTA Button -->
					<div class="product-cta">
						<?php $text = 'Send Your Inquiry';
                        $url = home_url('/contact');
                        $type = 'primary';
                        include get_template_directory() . '/components/button.php';
                        ?>
					</div>
					
				</div>
				
			</div>
		</div>
	</section>
	
	<!-- ============================================
		 SECTION 2: PARAMETERS
		 ============================================ -->
	<section class="product-parameters section-padding">
		<div class="container">
			
			<h2 class="section-title">Parameters</h2>
			
			<?php
			// Get product attributes
			$attributes = $product->get_attributes();
			
			if (!empty($attributes)) :
			?>
				<div class="parameters-table-wrapper">
					<table class="parameters-table">
						<tbody>
							<tr class="parameter-header">
								<td class="parameter-tittle">Parameters</td>
								<td class="parameter-tittle">Values</td>
							</tr>
							<?php
							foreach ($attributes as $attribute) :
								// Get attribute name and values
								$attribute_name = wc_attribute_label($attribute->get_name());
								
								if ($attribute->is_taxonomy()) {
									// For taxonomy-based attributes
									$values = wc_get_product_terms($product->get_id(), $attribute->get_name(), array('fields' => 'names'));
									$attribute_value = implode(', ', $values);
								} else {
									// For custom product attributes
									$attribute_value = $attribute->get_options();
									if (is_array($attribute_value)) {
										$attribute_value = implode(', ', $attribute_value);
									}
								}
								
								if (empty($attribute_value)) continue;
							?>
								<tr>
									<td class="parameter-name"><?php echo esc_html($attribute_name); ?></td>
									<td class="parameter-value"><?php echo esc_html($attribute_value); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<?php else : ?>
				<p class="no-parameters">No technical parameters available for this product.</p>
			<?php endif; ?>
			
		</div>
	</section>
	
	<!-- ============================================
		 SECTION 3: APPLICATIONS
		 ============================================ -->
	<section class="product-applications section-padding">
		<div class="container">
			
			<h2 class="section-title">Applications</h2>
			
			<div class="applications-grid">
				<?php
				// Get application images from custom meta box
				$application_images = get_post_meta( get_the_ID(), '_application_images', true );
				
				if (!empty($application_images) && is_array($application_images)) :
					// Display uploaded application images
					foreach ($application_images as $image_id) :
						if (empty($image_id)) continue;
						
						$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
						$image_caption = wp_get_attachment_caption($image_id);
						?>
						<div class="application-item">
							<?php echo wp_get_attachment_image($image_id, 'large', false, array('class' => 'application-image')); ?>
							<?php if ($image_caption) : ?>
								<p class="application-caption"><?php echo esc_html($image_caption); ?></p>
							<?php endif; ?>
						</div>
						<?php
					endforeach;
				else :
					// Fallback: show featured image if no application images uploaded
					if (has_post_thumbnail()) :
						for ($i = 0; $i < 3; $i++) :
						?>
							<div class="application-item">
								<?php the_post_thumbnail('large', array('class' => 'application-image')); ?>
							</div>
						<?php
						endfor;
					endif;
				endif;
				?>
			</div>
			
		</div>
	</section>
	
	<!-- ============================================
		 SECTION 4: YOUTUBE VIDEO
		 ============================================ -->
	<?php
	// Get YouTube URL from product meta, use default if not set
	$youtube_url = get_post_meta( get_the_ID(), '_youtube_url', true );
	if ( empty( $youtube_url ) ) {
		$youtube_url = 'https://youtu.be/W2asSTOox_k'; // Default video
	}
	$embed_url = get_youtube_embed_url( $youtube_url );
	
	if ( $embed_url ) : ?>
		<section class="product-youtube-section section-padding">
			<div class="container">
				<h2 class="section-title">Product Video</h2>
				<div class="youtube-wrapper">
					<iframe 
						width="560" 
						height="315" 
						src="<?php echo esc_url( $embed_url ); ?>" 
						frameborder="0" 
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
						allowfullscreen>
					</iframe>
				</div>
			</div>
		</section>
	<?php endif; ?>
	
	<!-- ============================================
		 SECTION 5: INQUIRY FORM
		 ============================================ -->
	<?php get_template_part('parts/cta'); ?>

</div>

<?php
/**
 * Hook: woocommerce_after_single_product.
 */
do_action( 'woocommerce_after_single_product' );
?>
