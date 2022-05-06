</main>
    <footer>
        <section class="footer-top">
            <ul class="footer-top-list">
                <li><a href="about-the-site">このサイトについて</a></li>
                <li><a href="terms-of-use">ご利用規約</a></li>
                <li><a href="#">お問合せ</a></li>
                <li><a href="#">プライバシーポリシー</a></li>
            </ul>
        </section>
        <section class="footer-bottom">
            <small>
                @<?php echo date('Y'); ?> Miyazaki Yûki all rights reserved.
            </small>
        </section>
        <ul class="footer__nav">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house-chimney footer__icon"></i><p>Home</p></a></li>
            <li><a href="#tagModal" class="tag-modal"><i class="fa-solid fa-tags footer__icon"></i><p>Tag</p></a></li>
            <li><a href="#searchModal" class="search-modal"><i class="fa-solid fa-magnifying-glass footer__icon"></i><p>Search</p></a></li>
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
            <?php dynamic_sidebar('modal'); ?>
        <?php endif; ?>
    </div>
</body>
<?php wp_footer(); ?>
</html>