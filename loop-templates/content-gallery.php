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
        <div id="acfCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">

                <?php 
                $first = true;
                while ( have_rows('gallery_list') ) : the_row(); 
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    if ( $image ) : 
                ?>
                    <div class="carousel-item <?php if ($first) { echo 'active'; $first = false; } ?>">
                        <a href="<?php echo esc_url($image['url']); ?>" class="glightbox" data-title="<?php echo esc_attr($title); ?>">
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" 
                                 class="d-block w-100 img-fluid rounded shadow-sm" 
                                 alt="<?php echo esc_attr($image['alt']); ?>">
                        </a>
                        <?php if ( $title ) : ?>
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: white;"><?php echo esc_html($title); ?></h5>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php 
                    endif; 
                endwhile; 
                ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#acfCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#acfCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            <div class="carousel-indicators">
                <?php 
                $i = 0;
                while ( have_rows('gallery_list') ) : the_row(); ?>
                    <button type="button" data-bs-target="#acfCarousel" data-bs-slide-to="<?php echo $i; ?>" 
                        class="<?php echo $i === 0 ? 'active' : ''; ?>" 
                        aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>" 
                        aria-label="Slide <?php echo $i + 1; ?>"></button>
                <?php $i++; endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
