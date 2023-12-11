<?php get_header(); ?>
  <section class="common-section information">
    <h1 class="information__heading section-heading"><?php the_title(); ?></h1>
    <ul class="information-list">
      <?php
        $the_query = new WP_Query(
          array(
            'post_type' => 'information',
            'posts_per_page' => 50
          )
        );
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) :
            $the_query->the_post();

            ?>
            <li>
              <a href="<?php the_permalink(); ?>">
                <p class="information__date"><?php the_time('Y.m.d'); ?></p>
                <p class="information__title"><?php the_title(); ?></p>
              </a>
            </li>
          <?php endwhile; ?>
        <?php else : ?>
          <li>お知らせはありません。</li>
        <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  </section>
<?php get_footer(); ?>