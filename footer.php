</main>
    <footer class="footer">
        <section class="footer__top">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => 'footer-top-list',
                ) );
            ?>
        </section>
        <section class="footer__bottom">
            <small>
                @<?php echo date('Y'); ?> Miyazaki Yûki all rights reserved.
            </small>
        </section>
        <?php //スマホ用ナビ ?>
        <ul class="footer__sp-nav">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="ホーム"><i class="fa-solid fa-house-chimney footer__icon"></i><p>ホーム</p></a></li>
            <li><a href="seasons/" title="四季の花一覧"><i class="fa-solid fa-sun footer__icon"></i><p>四季の花</p></a></li>
            <li><a href="#tagModal" class="tag-modal" title="タグ"><i class="fa-solid fa-tags footer__icon"></i><p>タグ</p></a></li>
            <li><a href="#searchModal" class="search-modal" title="検索"><i class="fa-solid fa-magnifying-glass footer__icon"></i><p>検索</p></a></li>
        </ul>
    </footer>
    <div id="searchModal" style="display:none;">
        <?php get_search_form(); ?>
        <p class="search-text">
            花の名前、色、季節などで検索
        </p>
    </div>
    <div id="tagModal" style="display:none;">
        <?php if ( is_active_sidebar('modal') ) : ?>
            <ul>
                <?php dynamic_sidebar('modal'); ?>
            </ul>
        <?php endif; ?>
    </div>

    <script src="https://kit.fontawesome.com/8cd2a8b7a7.js" crossorigin="anonymous"></script>
    <?php wp_footer(); ?>
</body>

</html>