<?php
/**
 * Template part for displaying about section
 *
 * @package Church Services
 * @subpackage church_services
 */

?>

<section id="about">
  <div class="container">
    <div class="row">
      <?php $church_services_about_page = array();
        $church_services_mod = absint( get_theme_mod( 'church_services_about_page' ));
        if ( 'page-none-selected' != $church_services_mod ) {
          $church_services_about_page[] = $church_services_mod;
        }
      if( !empty($church_services_about_page) ) :
        $church_services_args = array(
          'post_type' => 'page',
          'post__in' => $church_services_about_page,
          'orderby' => 'post__in'
        );
        $church_services_query = new WP_Query( $church_services_args );
        if ( $church_services_query->have_posts() ) :
          while ( $church_services_query->have_posts() ) : $church_services_query->the_post(); ?>
          <div class="col-lg-6 col-md-6 align-self-center">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <?php if( get_theme_mod( 'church_services_about_short_heading' ) != '' ) { ?>
              <h6><?php echo esc_html( get_theme_mod( 'church_services_about_short_heading','' ) ); ?></h6>
            <?php } ?>
            <h4><?php the_title(); ?></h4>
            <p><?php $church_services_excerpt = get_the_excerpt();echo esc_html( church_services_string_limit_words( $church_services_excerpt,30 ) ); ?></p>
              <div class="row">
              <?php $church_services_record = get_theme_mod('church_services_record_increament');
                for ($church_services_i=1; $church_services_i <= $church_services_record; $church_services_i++) { ?>
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="record-inner-box text-center">
                      <?php if( get_theme_mod('church_services_record_box_number'.$church_services_i) != '' ){ ?>
                        <h3><?php echo esc_html(get_theme_mod('church_services_record_box_number'.$church_services_i)); ?></h3>
                      <?php }?>
                      <?php if( get_theme_mod('church_services_record_box_title'.$church_services_i) != '' ){ ?>
                        <p><?php echo esc_html(get_theme_mod('church_services_record_box_title'.$church_services_i)); ?></p>
                      <?php }?>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','church-services'); ?></a>
              </div>
          </div>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;
      wp_reset_postdata()?>
      <div class="clearfix"></div>
    </div>
  </div>
</section>
