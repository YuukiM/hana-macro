<?php get_header(); ?>
    <section class="page-section common-section">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile;?>
        <?php else : ?>
            <p>記事はありません。</p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>