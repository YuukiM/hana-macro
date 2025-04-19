<section class="pick-up common-section">
	<h2 class="pick-up__heading section-heading">
		ピックアップ
	</h2>
	<p class="section-lead">
		季節の写真
	</p>
	<ul class="pick-up__list common-image-list">
		<?php
		$currentMonth = date('m');
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
				),
				'tax_query' => array(
					array(
						'taxonomy' => 'month',
						'field' => 'slug',
						'terms' => $currentMonth
					)
				),
				'orderby' => 'rand'
			)
		);
		if ($the_query->have_posts()) :
			while ($the_query->have_posts()) :
				$the_query->the_post();
				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title();
					title_postfix(); ?>"> <img src="<?php attachment_image('medium', 'url'); ?>" alt="<?php echo get_the_title();
						title_postfix(); ?>" width="300" height="225" loading="lazy" decoding="async"> </a>
					<?php echo do_shortcode('[wp_ulike]'); ?>
				</li>
			<?php endwhile; ?>
		<?php else : ?>
			<li>ピックアップはありません。</li>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
	<a class="button-primary" href="pick-up">もっと見る</a>
</section>