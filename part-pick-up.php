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
                <li><a href="<?php the_permalink(); ?>"><img src="<?php echo $image_field; ?>" alt="<?php the_title(); ?>のマクロ写真" title="<?php the_title(); ?>のマクロ写真" loading="lazy"></a></li>
            <?php endwhile;?>
        <?php else : ?>
            <li>ピックアップはありません。</li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <a class="button-primary" href="pick-up">もっと見る</a>
</section>