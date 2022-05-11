<?php get_header(); ?>
    <section class="new-items common-section">
        <h1 class="information__heading section-heading"><?php the_title(); ?></h1>
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
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php attachment_image('medium', 'img'); ?>
                        </a>
                    </li>
                <?php endwhile;?>
            <?php else : ?>
                <li>新しい記事はありません。</li>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </section>
    <?php /*
        the_posts_pagination(
            array(
                'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                'prev_text'     => __( '前へ'), // 「前へ」リンクのテキスト
                'next_text'     => __( '次へ'), // 「次へ」リンクのテキスト
                'type'          => 'list', // 戻り値の指定 (plain/list)
            )
        );
 */
    ?>
<?php get_footer(); ?>