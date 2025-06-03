<?php
/**
 * Template Name: News Category
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">

    <div class="container" id="content" tabindex="-1">

        <div class="row">

            <main class="site-main col-md-12" id="programs">

                <?php
                // Show the page's own content (intro at top)
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>

                <hr>

                <h2 class="my-5">News</h2>

                <?php
                // Get current page for pagination
                $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                // Custom query for category posts
                $programs_query = new WP_Query(array(
                    'post_type'      => 'post',
                    'category_name'  => 'news', 
                    'posts_per_page' => 9,
                    'paged'          => $paged,
                    'order'       => 'DESC',
                ));
                ?>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                    <?php if ( $programs_query->have_posts() ) :
                        while ( $programs_query->have_posts() ) : $programs_query->the_post(); ?>
                            <div class="col">
                                <div class="card h-100">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'medium', ['class' => 'card-img-top'] ); ?>
                                        </a>
                                    <?php endif; ?>

                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h5>
                                        <p class="card-text">by: <?php the_author(); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Posted on <?php echo get_the_date(); ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>No posts found in this category.</p>
                    <?php endif; ?>
                </div>

                
            </main><!-- #main -->

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
