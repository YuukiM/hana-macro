<?php get_header(); ?>
<section class="common-section">
    <?php if (have_posts()): ?>
        <?php
            if (isset($_GET['s']) && empty($_GET['s'])) {
                echo '<h1 class="section-heading">検索キーワードが入力されていません</h1>';
            } else {
                echo '<h1 class="section-heading">「'.$_GET['s'] .'」の写真が'.$wp_query->found_posts .'枚<br class="sp-only">見つかりました</h1>';
                echo '<ul class="common-image-list">';
                while(have_posts()): the_post();
                    $image_field = get_field('post-image');
                    echo '<li>';
                    echo '<a href="'.get_the_permalink().'"><img src="'.$image_field.'" alt="'.get_the_title().'" title="'.get_the_title().'" loading="lazy"></a>';
                    echo '</li>';
                endwhile;
                echo '</ul>';
            }
        ?>
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
