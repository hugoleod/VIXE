<?php
/**
 * Template part for displaying posts
 *
 * @package Church Services
 * @subpackage church_services
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="page-box row">
      <?php 
        if(has_post_thumbnail()) { ?>
        <div class="box-image col-lg-6 col-md-6 p-0">
          <?php the_post_thumbnail();  ?>    
        </div>
      <?php } ?>
      <div class="box-content <?php 
        if(has_post_thumbnail()) { ?>col-lg-6 col-md-6"<?php } else { ?>col-lg-12 col-md-12 "<?php } ?>>
        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
        <div class="box-info">
          <?php if(get_theme_mod('church_services_remove_date',true) != ''){ ?>
            <i class="far fa-calendar-alt"></i><span class="entry-date"><?php the_date(); ?></span>
          <?php }?>
          <?php if(get_theme_mod('church_services_remove_author',true) != ''){ ?>
            <i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
          <?php }?>
          <?php if(get_theme_mod('church_services_remove_comments',true) != ''){ ?>
            <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','church-services'), __('0 Comments','church-services'), __('% Comments','church-services') ); ?></span>
          <?php }?>
        </div>
        <p><?php $church_services_excerpt = get_the_excerpt(); echo esc_html( church_services_string_limit_words( $church_services_excerpt, esc_attr(get_theme_mod('church_services_excerpt_count','35')))); ?></p>
        <?php if(get_theme_mod('church_services_remove_read_button',true) != ''){ ?>
          <div class="readmore-btn">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'church-services' ); ?>"><?php echo esc_html(get_theme_mod('church_services_read_more_text',__('Read More','church-services')));?></a>
          </div>
        <?php }?>
      </div>
      <div class="clearfix"></div>
  </div>
</article>