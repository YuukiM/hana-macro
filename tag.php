<?php get_header(); ?>
<?php
  global $wp_query;
  $post_obj = $wp_query->get_queried_object();
  $tag_slug = $post_obj->slug;  //タグアーカイブページスラッグ
?>
  <section class="new-items common-section">
    <h1 class="page-heading">「<?php single_tag_title(); ?>」の写真一覧</h1>
    <ul class="common-image-list">
      <?php
        $the_query = new WP_Query(
          array(
            'post_type' => 'post',
            'posts_per_page' => 30,
            'tag' => $tag_slug,
            'paged' => get_query_var('paged', 1)
          )
        );
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) :

            $the_query->the_post();
            ?>
            <li>
              <a href="<?php the_permalink(); ?>" style="background-image: url('<?php attachment_image('medium', 'url'); ?>')" title="<?php echo get_the_title();
                title_postfix(); ?>"></a>
            </li>
          <?php endwhile; ?>
        <?php else : ?>
          <li>「<?php single_tag_title(); ?>」の写真はありません。</li>
        <?php endif; ?>
    </ul>
    <?php the_posts_pagination(
      array(
        'mid_size' => 2, // 現在ページの左右に表示するページ番号の数
        'prev_next' => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
        'prev_text' => '<svg class="page-numbers__arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg>',
        'next_text' => '<svg class="page-numbers__arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>',
        'type' => 'list', // 戻り値の指定 (plain/list)
      )
    ); ?>
    <?php wp_reset_postdata(); ?>
  </section>
<?php get_footer(); ?>