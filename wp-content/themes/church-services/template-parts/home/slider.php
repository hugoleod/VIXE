<?php
/**
 * Template part for displaying slider section
 *
 * @package Church Services
 * @subpackage church_services
 */

?>

<?php if( get_theme_mod( 'church_services_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $church_services_slide_pages = array();
      for ( $church_services_count = 1; $church_services_count <= 4; $church_services_count++ ) {
        $church_services_mod = intval( get_theme_mod( 'church_services_slider_page' . $church_services_count ));
        if ( 'page-none-selected' != $church_services_mod ) {
          $church_services_slide_pages[] = $church_services_mod;
        }
      }
      if( !empty($church_services_slide_pages) ) :
        $church_services_args = array(
          'post_type' => 'page',
          'post__in' => $church_services_slide_pages,
          'orderby' => 'post__in'
        );
        $church_services_query = new WP_Query( $church_services_args );
        if ( $church_services_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $church_services_query->have_posts() ) : $church_services_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <?php if( get_theme_mod( 'church_services_slider_short_heading' ) != '' ) { ?>
                <h6><?php echo esc_html( get_theme_mod( 'church_services_slider_short_heading','' ) ); ?></h6>
              <?php } ?>
              <h2><?php the_title(); ?></h2>
              <p><?php $church_services_excerpt = get_the_excerpt();echo esc_html( church_services_string_limit_words( $church_services_excerpt,15 ) ); ?></p>
              <?php if( get_theme_mod( 'church_services_slider_button',true) != '') { ?>
                <div class="more-btn">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','church-services'); ?></a>
                </div>
              <?php } ?>
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
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
