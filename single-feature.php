<?php get_header(); ?>
    <section class="page-section common-section">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <p class="date"><?php the_time('Y.m.d'); ?></p>
                <?php the_content(); ?>
            <?php endwhile;?>
        <?php else : ?>
            <p>新しい記事はありません。</p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>
