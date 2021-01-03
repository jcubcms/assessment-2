<?php


defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<?php
 $u3a_townsville_woocommerce_shop_page_sidebar = get_theme_mod( 'u3a_townsville_woocommerce_shop_page_sidebar' );
 if ( 'Disable' == $u3a_townsville_woocommerce_shop_page_sidebar ) {
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
				<header class="woocommerce-products-header">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>

					<?php
					
					do_action( 'woocommerce_archive_description' );
					?>
				</header>
				<?php
				if ( woocommerce_product_loop() ) {

					
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					
					do_action( 'woocommerce_no_products_found' );
				}

				
				do_action( 'woocommerce_after_main_content' );?>

			</div>
			<?php if ( 'Disable' != $u3a_townsville_woocommerce_shop_page_sidebar ) {?>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('woocommerce-shop-sidebar'); ?>
				</div>
			<?php } ?>
		</div>
	</main>
</div>

<?php
get_footer( 'shop' );