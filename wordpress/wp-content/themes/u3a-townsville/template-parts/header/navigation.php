<?php
/**
 * The template part for header
 *
 * @package U3A_TOWNSVILLE 
 * @subpackage u3a_townsville
 * @since U3A_TOWNSVILLE 1.0
 */
?>

<div id="header">
	<div class="header-menu <?php if( get_theme_mod( 'u3a_townsville_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
		<div class="container">
			<div class="menubar">
				<div class="row m-0">
					<div class="col-lg-9 col-md-9 p-0 col-4">
						<div class="toggle-nav mobile-menu">
						    <button role="tab" onclick="menu_openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','u3a-townsville'); ?></span></button>
						</div>
						<div id="mySidenav" class="nav sidenav">
				          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'u3a-townsville' ); ?>">
				            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','u3a-townsville'); ?></span></a>
				            <?php 
				              wp_nav_menu( array( 
				                'theme_location' => 'primary',
				                'container_class' => 'main-menu clearfix' ,
				                'menu_class' => 'clearfix',
				                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                'fallback_cb' => 'wp_page_menu',
				              ) ); 
				            ?>
				          </nav>
	        			</div>
					</div>
					<div class="col-lg-3 col-md-3 pr-0 col-8">
						<?php if( get_theme_mod( 'u3a_townsville_top_btn_url') != '' | get_theme_mod( 'u3a_townsville_top_btn_text') != '') { ?>
							<div class="top-btn">
								<a href="<?php echo esc_url(get_theme_mod('u3a_townsvillel_top_btn_url',''));?>"><?php echo esc_html(get_theme_mod('u3a_townsville_top_btn_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'GET AN APPOINTMENT','u3a-townsville' );?></span></a>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>