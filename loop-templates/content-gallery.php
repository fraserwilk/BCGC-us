<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">



	<div class="entry-content">

		<?php if ( have_rows('gallery_list') ) : ?>
    <div class="galleries">
        <?php while ( have_rows('gallery_list') ) : the_row(); ?>
            <?php $image = get_sub_field('image'); ?>
            <?php $title = get_sub_field('title'); ?>

            <?php if ( $image ) : ?>
                <div class="gallery mb-4">
                    <?php if ( $title ) : ?>
                        <h3><?php echo esc_html($title); ?></h3>
                    <?php endif; ?>
                    <div class="row">
                            <div class="col-md-4 mb-3">
                                <a href="<?php echo esc_url($image['url']); ?>" target="_blank">
                                    <img src="<?php echo esc_url($image['sizes']['large']); ?>" 
                                        alt="<?php echo esc_attr($image['alt']); ?>" 
                                        class="img-fluid rounded shadow-sm" />
                                </a>
                            </div>

                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
