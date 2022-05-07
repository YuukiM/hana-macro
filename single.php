<?php get_header(); ?>
    <section class="single-item common-section">
        <div class="single-item__inner">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="single-item__heading section-heading">
                        <?php echo get_the_title().'のマクロ写真' ?>
                    </h1>
                    <?php
                        $image_field = get_field('post-image');
                        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                        $fullsize = 'medium'; // (thumbnail, medium, large, full or custom size)
                        $img_attr = array(
                            'src'   => $src,	// アイキャッチ画像の URL
                            'class' => "attachment-$size",	// 指定した大きさ
                            'alt'   => get_the_title().'のマクロ写真',	// アイキャッチ画像の抜粋
                            'title' => get_the_title().'のマクロ写真',	// アイキャッチ画像のタイトル
                        );
                        $image = wp_get_attachment_image( $image_field, $size, false, $img_attr );
                        $url = wp_get_attachment_image_src( $image_field, $fullsize);

                    ?>
                    <?php echo $image; ?>
                    <ul class="single-item__tags">
                        <?php
                        $tags = get_the_tags();
                        foreach ( $tags as $tag ) {
                            echo '<li><a href="'.get_tag_link( $tag->term_id).'">' . $tag->name . '</a></li>';
                        }
                        ?>
                    </ul>
                    <div class="single-item__text">
                        <?php the_content(); ?>
                    </div>
                    <a href="<?php echo $url[0]; ?>" class="download-button" download>無料ダウンロード <i class="fa-solid fa-file-arrow-down"></i></a>
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