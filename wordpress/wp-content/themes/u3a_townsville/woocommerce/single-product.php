<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

get_header( 'shop' ); ?>

<?php
 $u3a_townsville_woocommerce_single_product_page_sidebar = get_theme_mod( 'u3a_townsville_woocommerce_single_product_page_sidebar' );
 if ( 'Disable' == $u3a_townsville_woocommerce_single_product_page_sidebar ) {
   $colmd = 'col-lg-12 col-md-12';
 } else { 
   $colmd = 'col-lg-8 col-md-8';
 } 
?>

<div class="container">
	<main id="maincontent" role="main" class="middle-align">
		<div class="row m-0">
			<div class="<?php echo esc_html( $colmd ); ?>">
				<?php
					
					do_action( 'woocommerce_before_main_content' );
				?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php
					
					do_action( 'woocommerce_after_main_content' );
				?>
			</div>
			<?php if ( 'Disable' != $u3a_townsville_woocommerce_single_product_page_sidebar ) {?>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('woocommerce-single-sidebar'); ?>
				</div>
			<?php } ?>
		</div>
	</main>
</div>

<?php get_footer( 'shop' );

