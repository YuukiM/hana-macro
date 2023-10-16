<?php get_header(); ?>
    <section class="single-item common-section">
        <div class="single-item__inner">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="single-item__heading">
                        <?php echo get_the_title();title_postfix(); ?>
                    </h1>
                    <img src="<?php attachment_image('large', 'url'); ?>" class="single-item__image" alt="<?php echo get_the_title();title_postfix(); ?>" title="<?php echo get_the_title();title_postfix(); ?>" width="400" height="300">
                    <?php echo do_shortcode('[wp_ulike]'); ?>
										<?php if(get_the_tags()) { ?>
                    <ul class="single-item__tags">
                        <?php
                            $tags = get_the_tags();
                            foreach ( $tags as $tag ):
                        ?>
                            <li><a href="<?php echo get_tag_link( $tag->term_id); ?>"><i class="fa-solid fa-tag"></i><?php echo $tag->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
										<?php } ?>
                    <ul class="single-item__seasons">
                        <?php
                            $categories = get_the_category();
                            foreach ($categories as $category ):
                        ?>
                            <li class="season-<?php echo $category->slug; ?>"><a href="<?php echo get_category_link( $category->term_id); ?>"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="single-item__text">
                        <?php the_content(); ?>
                    </div>

                    <?php if (image_metadata('camera')): ?>
                      <ul class="single-item__exif">
                        <li><?php echo image_metadata('camera'); ?></li>
                        <li>ISO<?php echo image_metadata('iso'); ?></li>
                        <li>F<?php echo image_metadata('aperture'); ?></li>
                        <li>シャッター速度: <?php echo image_metadata('shutter_speed'); ?>sec.</li>
                        <li><?php echo image_metadata('focal_length'); ?>mm</li>
                      </ul>
                    <?php endif; ?>

                    <p class="single-item__date"><?php the_date(); ?>公開</p>
                    <a href="<?php attachment_image('full', 'url'); ?>" class="download-button" download>無料ダウンロード <i class="fa-solid fa-file-arrow-down"></i></a>
                    <p class="kiyaku">
                        <a class="kiyaku-link" href="terms-of-use" target="_blank">ご利用規約</a>
                    </p>
                <?php endwhile;?>
            <?php else : ?>
                <p>新しい記事はありません。</p>
            <?php endif; ?>
        </div>
    </section>
    <section class="related-items common-section">
        <h2 class="related-items__heading section-heading">
            関連画像
        </h2>
        <?php echo do_shortcode('[yarpp]'); ?>
    </section>
<?php get_footer(); ?>