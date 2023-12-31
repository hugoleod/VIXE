<?php
/**
 * Template part for displaying posts
 *
 * @package Church Services
 * @subpackage church_services
 */

?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="page-box row">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $video ) ) {
          foreach ( $video as $video_html ) {
            echo '<div class="entry-video">';
              echo $video_html;
            echo '</div>';
          }
        };
      };
    ?> 
    <div class="box-content">
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