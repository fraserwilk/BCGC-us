<?php
/**
 * Template for displaying posts in the 'Sponsor' category
 */

get_header();
?>

<div class="wrapper" id="category-sponsor-wrapper">
    <div class="container" id="content" tabindex="-1">
        <div class="row">
            <main class="site-main col-md-8" id="main">

                <header class="page-header">
                    <h1 class="page-title">Sponsor Directory</h1>
                </header>

                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <article <?php post_class('mb-5'); ?> id="post-<?php the_ID(); ?>">
                            <div class="card p-3">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <?php if ( get_field('sponsor_url') ) : ?>
                                            <a href="<?php the_field('sponsor_url'); ?>" target="_blank" rel="noopener">
                                                <?php echo esc_html( the_field('sponsor_name') ); ?>
                                            </a>
                                        <?php else : ?>
                                            <?php echo esc_html(the_field('sponsor_name') ) ; ?>
                                        <?php endif; ?>
                                    </h2>
                                </header>
								<?php if (get_field('sponsor_logo') ) : ?>
									<div class="mb-3">
                                        <img src="<?php esc_url( the_field('sponsor_logo') ); ?>" alt="<?php  esc_attr( the_field('sponsor_logo_alt') ) ; ?>" class="img-fluid">
                                    </div>
                                <?php endif; ?>

                                

                                <?php if ( get_field('sponsor_description') ) : ?>
                                    <div class="entry-content">
                                        <p><?php the_field('sponsor_description'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>

                    <?php endwhile; ?>

                    <?php understrap_pagination(); ?>

                <?php else : ?>
                    <p>No sponsor posts found.</p>
                <?php endif; ?>

            </main><!-- #main -->

            <?php get_sidebar(); ?>
        </div><!-- .row -->
    </div><!-- #content -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
