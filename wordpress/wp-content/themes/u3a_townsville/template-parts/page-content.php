<?php

?>

<div class="content-vw">
  <?php the_post_thumbnail(); ?>
  <h1><?php the_title();?></h1>
  <div class="entry-content"><?php the_content();?></div>
  <?php
      
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
  ?>
  <div class="clearfix"></div>
</div>