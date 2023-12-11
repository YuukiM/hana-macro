<?php get_header(); ?>
<section class="common-section">
  <h1 class="page-heading">お探しのページは見つかりませんでした。</h1>
</section>
<section class="in-page-search common-section">
  <p class="in-page-search__text">
    マクロ写真をキーワードで検索
  </p>
  <?php get_search_form(); ?>
</section>
<?php get_template_part('part-new-image'); ?>
<?php get_template_part('part-pick-up'); ?>

<?php get_footer(); ?>
