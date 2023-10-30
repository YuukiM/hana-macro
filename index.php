<?php get_header(); ?>
			<section class="top-image">
					<div class="top-image__slider swiper js-swiper">
						<div class="swiper-wrapper">
							<?php
							$the_query = new WP_Query(
									array(
											'post_type' => 'post',
											'posts_per_page' => 12,
											'meta_query' => array(
													'relation' => 'AND',
													array(
															'key' => 'sliderDisplay',
															'value' => 'display',
															'compare' => 'LIKE'
													)
											)
									)
							);
							if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) :
											$the_query->the_post();
							?>
									<div class="swiper-slide">
										<img src="<?php attachment_image('full', 'url'); ?>" srcset="<?php attachment_image('large', 'url'); ?> 1000w, <?php attachment_image('full', 'url'); ?> 1920w," alt="" width="1920" height="1440" decoding="async">
										<a class="top-image__url" href="<?php echo esc_url( get_permalink() ); ?>">この画像を見る</a>
									</div>
									<?php endwhile;?>
							<?php else : ?>
									<p>ピックアップはありません。</p>
							<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</div>
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
											echo '現在、'.$num.'枚の画像を無料でダウンロードできます。';
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
        <section class="about-this-site common-section">
            花マクロワールドへようこそ！<br>
            花マクロワールドは、クレジット不要で商用利用OKな写真素材サイトです。<br>
            豊富な花の写真、マクロ写真をぜひご利用ください。
        </section>
        <?php get_template_part('part-feature'); ?>

        <?php get_template_part('part-new-image'); ?>
<?php
        /*<section class="ad-area common-section">
            AD
        </section>*/
?>

        <?php get_template_part('part-pick-up'); ?>
        <section class="information common-section">
            <h2 class="information__heading section-heading">
                お知らせ
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