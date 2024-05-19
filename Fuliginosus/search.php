<?php get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <header class="page-header">
            <h1 class="page-title"><?php printf( esc_html__( 'Zoekresultaten voor: %s', 'flavus' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header><!-- .page-header -->

        <?php
        if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_format() );
            endwhile;
            the_posts_pagination();
        else:
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
    </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>