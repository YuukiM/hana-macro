<section class="new-items common-section">
    <h2 class="new-items__heading section-heading">
        New
    </h2>
    <ul class="new-items__list common-image-list">
        <?php
        $the_query = new WP_Query(
            array(
                'post_type' => 'post',
                'posts_per_page' => 60
            )
        );
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) :
                $the_query->the_post();

                $image_field = get_field('post-image');
                $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                $img_attr = array(
                    'src'   => $src,	// アイキャッチ画像の URL
                    'class' => "attachment-$size",	// 指定した大きさ
                    'alt'   => get_the_title().'のマクロ写真',	// アイキャッチ画像の抜粋
                    'title' => get_the_title().'のマクロ写真',	// アイキャッチ画像のタイトル
                );
                $image = wp_get_attachment_image( $image_field, $size, false, $img_attr );
        ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php echo $image; ?>
                    </a>
                </li>
            <?php endwhile;?>
        <?php else : ?>
            <li>新しい記事はありません。</li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <a class="button-primary" href="new">もっと見る</a>
</section>