<?php get_header(); ?>
<section class="new-items common-section">
    <?php if (have_posts()): ?>
        <?php
            if (isset($_GET['s']) && empty($_GET['s'])) {
                echo '<h1 class="information__heading section-heading">検索キーワードが入力されていません</h1>';
            } else {
                echo '<h1 class="information__heading section-heading">「'.$_GET['s'] .'」の写真が'.$wp_query->found_posts .'枚<br class="sp-only">見つかりました</h1>';
                echo '<ul class="new-items__list common-image-list">';
                while(have_posts()): the_post();
                    $image_field = get_field('post-image');
                    echo '<li>';
                    echo '<a href="'.get_the_permalink().'"><img src="'.$image_field.'" alt="'.get_the_title().'" title="'.get_the_title().'" loading="lazy"></a>';
                    echo '</li>';
                endwhile;
                echo '</ul>';
            }
        ?>
        <?php else: ?>
            <h1 class="information__heading section-heading">検索キーワードにマッチする写真がありません</h1>
        <?php endif; ?>
</section>
<section class="in-page-search common-section">
    <p class="in-page-seach__text">
        別なキーワードで検索
    </p>
    <?php get_search_form(); ?>
</section>
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

                ?>

                <?php $image_field = get_field('post-image'); ?>
                <li><a href="<?php the_permalink(); ?>"><img src="<?php echo $image_field; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy"></a></li>
            <?php endwhile;?>
        <?php else : ?>
            <li>新しい記事はありません。</li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <a class="detail-button" href="new">もっと見る</a>
</section>
<section class="pick-up common-section">
    <h2 class="pick-up__heading section-heading">
        Pick up
    </h2>
    <ul class="pick-up__list common-image-list">
        <?php
        $the_query = new WP_Query(
            array(
                'post_type' => 'post',
                'posts_per_page' => 12,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'pickUp',
                        'value' => 'pickup',
                        'compare' => 'LIKE'
                    )
                )
            )
        );
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) :
                $the_query->the_post();
                $image_field = get_field('post-image');
                ?>
                <li><a href="<?php the_permalink(); ?>"><img src="<?php echo $image_field; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy"></a></li>
            <?php endwhile;?>
        <?php else : ?>
            <li>ピックアップはありません。</li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <a class="detail-button" href="pick-up">もっと見る</a>
</section>
<?php get_footer(); ?>
