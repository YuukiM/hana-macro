<?php get_header(); ?>
    <section class="common-section">
        <h1 class="information__heading section-heading"><?php the_title(); ?></h1>

        <?php
            $categories = get_categories(array('parent' => 0)); //最上位のカテゴリーのみを取得する
            foreach ($categories as $category):
        ?>
            <h2><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?></a></h2>
            <?php
            $my_query = new WP_Query(array('cat' => $category->term_id));
            if ($my_query->have_posts()):
                ?>
                <ul class="common-image-list">
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" style="background-image: url('<?php attachment_image('medium', 'url'); ?>')"  title="<?php echo get_the_title();title_postfix(); ?>"></a>
                            <?php echo do_shortcode('[wp_ulike]'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>投稿はありません。</p>
            <?php endif; ?>
            <a class="button-primary" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">もっと見る</a>
        <?php endforeach; ?>

    </section>
<?php get_footer(); ?>