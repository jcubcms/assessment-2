<?php
/**
 * The template part for displaying page content
 *
 * @package U3A_TOWNSVILLE 
 * @subpackage u3a_townsville
 * @since U3A_TOWNSVILLE 1.0
 */
?>

<div class="content-kg">
  <?php the_post_thumbnail(); ?>
  <h1><?php the_title();?></h1>
  <div class="entry-content"><?php the_content();?></div>
  <?php
      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
  ?>
  <div class="clearfix"></div>
</div>