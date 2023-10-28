<?php get_header(); ?>
    <section class="container-section">
        <h1 class="page-heading"><?php the_title(); ?></h1>

            <?php
                $categories = get_categories(array('parent' => 0)); //最上位のカテゴリーのみを取得する
                foreach ($categories as $category):
            ?>
            <section class="common-section">
                <h2 class="section-heading"><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?>の花</a></h2>
                <?php
                    $my_query = new WP_Query(
                        array(
                            'cat' => $category->term_id,
                            'posts_per_page' => 12
                        )
                    );
                    if ($my_query->have_posts()):
                ?>
                <ul class="common-image-list">
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title();title_postfix(); ?>">
															<img src="<?php attachment_image('medium', 'url'); ?>" alt="<?php echo get_the_title();title_postfix(); ?>" width="300" height="225">
														</a>
                            <?php echo do_shortcode('[wp_ulike]'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>投稿はありません。</p>
                <?php endif; ?>
                <a class="button-primary" href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?>の花一覧</a>
            </section>
            <?php endforeach; ?>

    </section>
<?php get_footer(); ?>