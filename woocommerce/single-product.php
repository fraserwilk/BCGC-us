<?php
/**
 * The Template for displaying all single products
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<div class="wrapper" id="single-product-wrapper">
    <div class="container" id="content" tabindex="-1">
        <div class="row">
            <main class="site-main col-12" id="main">
                <?php
                while ( have_posts() ) :
                    the_post();
                    wc_get_template_part( 'content', 'single-product' );
                endwhile;
                ?>
            </main>
        </div>
    </div>
</div>

<?php get_footer( 'shop' ); ?>
