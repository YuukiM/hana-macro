<section class="new-items common-section">
    <h2 class="new-items__heading section-heading">
        新着
    </h2>
		<p class="section-lead">
			新しい写真
		</p>
    <ul class="new-items__list common-image-list">
        <?php
        $the_query = new WP_Query(
            array(
                'post_type' => 'post',
                'posts_per_page' => 12
            )
        );
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) :
                $the_query->the_post();
        ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title();title_postfix(); ?>">
											<img src="<?php attachment_image('medium', 'url'); ?>" alt="<?php echo get_the_title();title_postfix(); ?>" width="300" height="225">
										</a>
                    <?php echo do_shortcode('[wp_ulike]'); ?>
                </li>
            <?php endwhile;?>
        <?php else : ?>
            <li>新しい写真はありません。</li>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
    <a class="button-primary" href="new">もっと見る</a>
</section>