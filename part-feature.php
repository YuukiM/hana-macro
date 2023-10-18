<section class="feature common-section">
    <h2 class="feature__heading section-heading">
        特集
    </h2>
		<p class="section-lead">
			お花のはなし
		</p>
    <ul class="feature__list common-image-list">
        <?php
        $the_query = new WP_Query(
            array(
                'post_type' => 'feature',
                'posts_per_page' => 4
            )
        );
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) :
                $the_query->the_post();
        ?>
                <li>
                    <a href="<?php the_permalink(); ?>" style="background-image: url('<?php attachment_image('medium', 'url'); ?>')"  title="<?php echo get_the_title(); ?>">
                        <?php echo get_the_title(); ?>
                    </a>
                </li>
            <?php endwhile;?>
        <?php else : ?>
            <li>特集記事はありません。</li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <!--<a class="button-primary" href="feature">もっと見る</a>-->
</section>