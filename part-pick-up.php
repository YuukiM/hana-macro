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
        ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php attachment_image('medium', 'url'); ?>" alt="<?php echo get_the_title().'のマクロ写真'; ?>" title="<?php echo get_the_title().'のマクロ写真'; ?>" width="400" height="300" loading="lazy">
                    </a>
                </li>
            <?php endwhile;?>
        <?php else : ?>
            <li>ピックアップはありません。</li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <a class="button-primary" href="pick-up">もっと見る</a>
</section>