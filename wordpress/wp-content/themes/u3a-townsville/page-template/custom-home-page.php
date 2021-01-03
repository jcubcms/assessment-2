<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'u3a_townsville_before_slider' ); ?>

  <?php if( get_theme_mod( 'u3a_townsville_slider_hide_show',true) != '') { ?>

    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'u3a_townsville_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $slider_page[] = $mod;
            }
          }
          if( !empty($slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><?php the_title(); ?></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( u3a_townsville_string_limit_words( $excerpt, esc_attr(get_theme_mod('u3a_townsville_slider_excerpt_number','30')))); ?></p>
                  <div class="more-btn">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'u3a-townsville' ); ?><i class="fa fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Read More','u3a-townsville' );?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Previous','u3a-townsville' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Next','u3a-townsville' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>

  <?php } ?>

  <?php do_action( 'u3a_townsville_after_slider' ); ?>

  <section id="services-section">
    <div class="container">
      <?php if( get_theme_mod( 'u3a_townsville_section_title') != '') { ?>
        <h2><?php echo esc_html(get_theme_mod('u3a_townsville_section_title',''));?></h2>
      <?php }?>
      <div class="row">
        <div class="col-lg-4 col-md-4"> 
          <?php
            $catData =  get_theme_mod('u3a_townsville_left_service','');
            if($catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'u3a-townsville'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="left-services">
                <div class="row">
                  <div class="col-lg-8 col-md-8">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( u3a_townsville_string_limit_words( $excerpt, esc_attr(get_theme_mod('u3a_townsville_services_excerpt_number','30')))); ?></p>
                  </div>
                  <div class="col-lg-4 col-md-4 p-md-0">
                    <?php the_post_thumbnail(); ?>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php $service_page = array();
            $mod = absint( get_theme_mod( 'u3a_townsville_about','u3a-townsville'));
            if ( 'page-none-selected' != $mod ) {
              $service_page[] = $mod;
            }
            if( !empty($service_page) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $service_page,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $count = 0;
                while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="box">
                  <?php the_post_thumbnail(); ?>
                  <div class="box-content">
                    <div class="content">
                      <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                      <p class="post"><?php $excerpt = get_the_excerpt(); echo esc_html( u3a_townsville_string_limit_words( $excerpt, esc_attr(get_theme_mod('u3a_townsville_services_excerpt_number','30')))); ?></p>
                    </div>
                  </div>
                </div>
                <?php $count++; endwhile; ?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php endif;
            endif;
            wp_reset_postdata();
          ?>
        </div>
        <div class="col-lg-4 col-md-4"> 
          <?php
            $catData =  get_theme_mod('u3a_townsville_right_service','');
            if($catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'u3a-townsville'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="right-services">
                <div class="row">
                  <div class="col-lg-4 col-md-4 p-md-0">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="col-lg-8 col-md-8">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( u3a_townsville_string_limit_words( $excerpt, esc_attr(get_theme_mod('u3a_townsville_services_excerpt_number','30')))); ?></p>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </div>
  </section>

  <?php do_action( 'u3a_townsville_after_services' ); ?>

  <div class="content-kg">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>