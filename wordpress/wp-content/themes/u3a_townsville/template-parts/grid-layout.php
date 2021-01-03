<?php

?>

<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box grid-option">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><?php the_title();?></h2>
	        <div class="new-text">
	        	<div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( u3a_townsville_string_limit_words( $excerpt, esc_attr(get_theme_mod('u3a_townsville_excerpt_number','30')))); ?></p></div>
	        </div>
	        <?php if( get_theme_mod('u3a_townsville_button_text','Read More') != ''){ ?>
		        <div class="content-bttn">
	        		<a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('u3a_townsville_button_text','Read More'));?><i class="fa fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Read More','u3a-townsville' );?></span></a>
	      		</div>
	      	<?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>