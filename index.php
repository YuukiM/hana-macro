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
        <?php get_template_part('part-new-image'); ?>
        <section class="ad-area common-section">
            AD
        </section>
        <?php get_template_part('part-pick-up'); ?>
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