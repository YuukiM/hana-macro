<?php get_header(); ?>
        <section class="top-image">
            <div class="top-image__slider">
                <?php echo do_shortcode('[slick-slider fade="true" autoplay_interval="5000" arrows="false" dots="false" speed="1000" ]'); ?>
            </div>
            <div class="top-image__texts">
                <div class="top-image__top">
                    <h2 class="top-image__heading">
                        無料の花マクロ写真素材
                    </h2>
                    <p class="top-image__lead">
                        <?php
                        $count_posts = wp_count_posts();
                        $num = $count_posts->publish;
                        echo '現在、'.$num.'枚の画像を無料でお使いいただけます。';
                        ?>
                    </p>
                </div>
                <div class="top-image__bottom">
                    <?php get_search_form(); ?>
                    <p class="search-text">
                        花の名前、色、季節などで検索
                    </p>
                </div>
                <p class="top-image__kiyaku">
                    <a class="top-image__kiyaku-link" href="terms-of-use">ご利用規約</a>
                </p>
            </div>
        </section>
            <section class="new-items common-section">
                <h2 class="new-items__heading section-heading">
                    New
                </h2>
                <ul class="new-items__list common-image-list">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php $image_field = get_field('post-image'); ?>
                            <li><a href="<?php the_permalink(); ?>"><img src="<?php echo $image_field; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy"></a></li>
                        <?php endwhile;?>
                    <?php else : ?>
                        <li>新しい記事はありません。</li>
                    <?php endif; ?>
                </ul>
                <a class="button-primary" href="new">もっと見る</a>
            </section>
            <section class="ad-area common-section">
                AD
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
                <a class="button-primary" href="pick-up">もっと見る</a>
            </section>
            <section class="information common-section">
                <h2 class="information__heading section-heading">
                    Information
                </h2>
                <ul class="information-list">
                    <?php
                    $the_query = new WP_Query(
                        array(
                            'post_type' => 'information',
                            'posts_per_page' => 6
                        )
                    );
                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) :
                            $the_query->the_post();

                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <p class="information__date"><?php the_time('Y.m.d'); ?></p>
                                    <p class="information__title"><?php the_title(); ?></p>
                                </a>
                            </li>
                        <?php endwhile;?>
                    <?php else : ?>
                        <li>お知らせはありません。</li>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
                <a class="button-primary" href="information">もっと見る</a>
            </section>
<?php get_footer(); ?>