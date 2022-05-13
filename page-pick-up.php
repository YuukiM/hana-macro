<?php get_header(); ?>
    <section class="new-items common-section">
        <h1 class="information__heading section-heading"><?php the_title(); ?></h1>
        <ul class="new-items__list common-image-list">
            <?php
            $the_query = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 60,
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
    </section>
<?php get_footer(); ?>