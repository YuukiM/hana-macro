<?php get_header(); ?>
    <section class="single-item common-section">
        <div class="single-item__inner">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="single-item__heading section-heading">
                        <?php echo get_the_title().'のマクロ写真' ?>
                    </h1>
                    <img src="<?php attachment_image('large', 'url'); ?>" alt="<?php echo get_the_title().'のマクロ写真'; ?>" title="<?php echo get_the_title().'のマクロ写真'; ?>" width="400" height="300">
                    <ul class="single-item__tags">
                        <?php
                            $tags = get_the_tags();
                            foreach ( $tags as $tag ):
                        ?>
                            <li><a href="<?php echo get_tag_link( $tag->term_id); ?>"><i class="fa-solid fa-tag"></i><?php echo $tag->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="single-item__seasons">
                        <?php
                            $categories = get_the_category();
                            foreach ($categories as $category ):
                        ?>
                            <li class="season-<?php echo $category->slug; ?>"><a href="<?php echo get_category_link( $category->term_id); ?>"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="single-item__text">
                        <?php the_content(); ?>
                    </div>
                    <a href="<?php attachment_image('full', 'url'); ?>" class="download-button" download>無料ダウンロード <i class="fa-solid fa-file-arrow-down"></i></a>
                    <p class="kiyaku">
                        <a class="kiyaku-link" href="terms-of-use" target="_blank">ご利用規約</a>
                    </p>
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