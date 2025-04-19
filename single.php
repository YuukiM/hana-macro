<?php get_header(); ?>
  <section class="single-item common-section">
    <div class="single-item__inner">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <h1 class="single-item__heading">
            <?php echo get_the_title();
              title_postfix(); ?>
          </h1>
          <img src="<?php attachment_image('large', 'url'); ?>" class="single-item__image" alt="<?php echo get_the_title();
            title_postfix(); ?>" title="<?php echo get_the_title();
            title_postfix(); ?>" width="400" height="300" decoding="async">
          <?php echo do_shortcode('[wp_ulike]'); ?>
          <?php if (get_the_tags()) { ?>
            <ul class="single-item__tags">
              <?php
                $tags = get_the_tags();
                foreach ($tags as $tag):
                  ?>
                  <li><a href="<?php echo get_tag_link($tag->term_id); ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                        <path d="M570-104q-23 23-57 23t-57-23L104-456q-11-11-17.5-26T80-514v-286q0-33 23.5-56.5T160-880h286q17 0 32 6.5t26 17.5l352 353q23 23 23 56.5T856-390L570-104Zm-57-56 286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640ZM160-800Z"/>
                      </svg><?php echo $tag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
          <?php } ?>
          <ul class="single-item__seasons">
            <?php
              $categories = get_the_category();
              foreach ($categories as $category):
                ?>
                <li class="season-<?php echo $category->slug; ?>">
                  <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
              <?php endforeach; ?>
          </ul>
          <div class="single-item__text">
            <?php the_content(); ?>
          </div>

          <?php if (image_metadata('camera')):
            $shutterSpeed = image_metadata('shutter_speed');
          ?>
            <ul class="single-item__exif">
              <li><?php echo image_metadata('camera'); ?></li>
              <li>ISO<?php echo image_metadata('iso'); ?></li>
              <li>F<?php echo image_metadata('aperture'); ?></li>
              <li>シャッター速度: <?php shutterSpeeds($shutterSpeed); ?></li>
              <li>焦点距離：<?php echo image_metadata('focal_length'); ?>mm</li>
            </ul>
          <?php endif; ?>

          <p class="single-item__date"><?php the_date(); ?>公開</p>
          <a href="<?php attachment_image('full', 'url'); ?>" class="download-button" download>無料ダウンロード
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
              <path d="m720-120 160-160-56-56-64 64v-167h-80v167l-64-64-56 56 160 160ZM560 0v-80h320V0H560ZM240-160q-33 0-56.5-23.5T160-240v-560q0-33 23.5-56.5T240-880h280l240 240v121h-80v-81H480v-200H240v560h240v80H240Zm0-80v-560 560Z"/>
            </svg>
          </a>
          <p class="kiyaku">
            <a class="kiyaku-link" href="terms-of-use" target="_blank">ご利用規約</a>
          </p>
        <?php endwhile; ?>
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