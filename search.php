<?php get_header(); ?>
<section class="common-section">
    <?php if (have_posts()): ?>
        <?php if (isset($_GET['s']) && empty($_GET['s'])): ?>
            <h1 class="section-heading">検索キーワードが入力されていません</h1>
        <?php else: ?>
            <h1 class="section-heading">「<?php echo $_GET['s'] ?>」の写真が<?php echo $wp_query->found_posts; ?> 枚<br class="sp-only">見つかりました</h1>
            <ul class="common-image-list">
                <?php
                    while(have_posts()): the_post();
                ?>
                    <li>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <img src="<?php attachment_image('medium', 'url'); ?>" alt="<?php echo get_the_title().'のマクロ写真'; ?>" title="<?php echo get_the_title().'のマクロ写真'; ?>" width="400" height="300" loading="lazy">
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    <?php else: ?>
        <h1 class="information__heading section-heading">検索キーワードにマッチする写真がありません</h1>
    <?php endif; ?>
    <?php the_posts_pagination(
        array(
            'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
            'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
            'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
            'next_text' => '<i class="fa-solid fa-angle-right"></i>',
            'type'          => 'list', // 戻り値の指定 (plain/list)
        )
    ); ?>
</section>
<section class="in-page-search common-section">
    <p class="in-page-search__text">
        別なキーワードで検索
    </p>
    <?php get_search_form(); ?>
</section>
<?php get_template_part('part-new-image'); ?>
<?php get_template_part('part-pick-up'); ?>
<?php get_footer(); ?>
