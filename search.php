<?php get_header(); ?>
<section class="common-section">
    <?php if (have_posts()): ?>
        <?php if (isset($_GET['s']) && empty($_GET['s'])): ?>
            <h1 class="page-heading">検索キーワードが入力されていません</h1>
        <?php else: ?>
            <h1 class="page-heading">「<?php echo $_GET['s'] ?>」の写真が<?php echo $wp_query->found_posts; ?>枚<br class="sp-only">見つかりました</h1>
            <ul class="common-image-list">
                <?php
                    while(have_posts()): the_post();
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" style="background-image: url('<?php attachment_image('medium', 'url'); ?>')"  title="<?php echo get_the_title();title_postfix(); ?>"></a>
                        <?php echo do_shortcode('[wp_ulike]'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php the_posts_pagination(
              array(
                'mid_size'	=> 2, // 現在ページの左右に表示するページ番号の数
                'prev_next'	=> true, // 「前へ」「次へ」のリンクを表示する場合はtrue
	              'prev_text' => '<svg class="page-numbers__arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg>',
	              'next_text' => '<svg class="page-numbers__arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>',
                'type'			=> 'list', // 戻り値の指定 (plain/list)
              )
            ); ?>
        <?php endif; ?>
    <?php else: ?>
        <h1 class="page-heading">検索キーワードにマッチする写真がありません</h1>
    <?php endif; ?>
</section>
<section class="in-page-search common-section">
    <p class="in-page-search__text">
        漢字やカタカナなどでもお試しください
    </p>
    <?php get_search_form(); ?>
</section>
<?php get_template_part('part-new-image'); ?>
<?php get_template_part('part-pick-up'); ?>
<?php get_footer(); ?>
