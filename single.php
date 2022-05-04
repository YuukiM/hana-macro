<?php get_header(); ?>
    <section class="single-item common-section">
        <div class="single-item__inner">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="single-item__heading section-heading">
                        <?php the_title(); ?>
                    </h1>
                    <?php $image_field = get_field('post-image'); ?>
                    <img src="<?php echo $image_field; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                    <ul class="single-item__tags">
                        <?php
                        $tags = get_the_tags();
                        foreach ( $tags as $tag ) {
                            echo '<li><a href="#">' . $tag->name . '</a></li>';
                        }
                        ?>
                    </ul>
                    <div class="single-item__text">
                        <?php the_content(); ?>
                    </div>
                    <a href="<?php echo $image_field; ?>" class="download-button" download>無料ダウンロード <i class="fa-solid fa-file-arrow-down"></i></a>
                <?php endwhile;?>
            <?php else : ?>
                <p>新しい記事はありません。</p>
            <?php endif; ?>
        </div>
    </section>
    <section class="related-items common-section">
        <h2 class="related-items__heading section-heading">
            関連画像
        </h2>
        <?php echo do_shortcode('[yarpp]'); ?>
    </section>
<?php get_footer(); ?>