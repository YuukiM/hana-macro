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
                            <?php attachment_image('medium', 'img'); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    <?php else: ?>
        <h1 class="information__heading section-heading">検索キーワードにマッチする写真がありません</h1>
    <?php endif; ?>
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
