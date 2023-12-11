</main>
<footer class="footer">
  <section class="footer__top">
    <?php
      wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'container' => false,
        'menu_class' => 'footer-top-list',
      ));
    ?>
  </section>
  <section class="footer__bottom">
    <small>
      @<?php echo date('Y'); ?> Miyazaki Yûki all rights reserved.
    </small>
  </section>
  <?php //スマホ用ナビ ?>
  <ul class="footer__sp-nav">
    <li>
      <a class="footer__sp-nav-link" href="<?php echo esc_url(home_url('/')); ?>" title="ホーム">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
        </svg>
        <p>ホーム</p>
      </a>
    </li>
    <li>
      <a class="footer__sp-nav-link" href="<?php echo esc_url(home_url()); ?>/seasons/" title="四季の花一覧">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="M482-80q-57 0-101-36t-55-92q-53 17-107-2t-83-66q-30-48-22-106.5t52-97.5q-42-38-50.5-94T134-678q27-48 81.5-69.5T324-752q11-56 55-92t101-36q57 0 101 36t55 92q56-17 108.5 3t81.5 71q27 50 19.5 104.5T794-480q44 39 52.5 96.5T828-276q-29 51-81.5 68T638-208q-11 56-55 92T482-80Zm0-80q47 0 70.5-40.5T552-280l-28-46q-11 3-21 4.5t-21 1.5q-10 0-20.5-1.5T440-326l-28 46q-24 39-.5 79.5T482-160ZM202-320q24 41 70.5 41t69.5-41l26-46q-8-8-15-17t-12-19q-5-9-9-18.5t-7-19.5h-53q-47 0-70 39.5t0 80.5Zm416 0q23 41 69.5 41t70.5-41q23-41 0-80.5T688-440h-53q-2 10-6.5 19.5T619-402q-5 10-12 19t-15 17l26 46ZM480-480Zm-155-40q3-11 7.5-21.5T342-561q5-9 11.5-17t14.5-16l-26-46q-23-41-69.5-41T202-640q-23 41 0 80.5t70 39.5h53Zm363 0q47 0 70-39.5t0-80.5q-24-41-70.5-41T618-640l-26 46q8 8 14.5 16t11.5 17q5 9 9.5 19.5T635-520h53ZM437-634q11-3 21.5-4.5T480-640q11 0 21.5 1.5T523-634l27-46q23-39 0-79.5T480-800q-47 0-70 40t0 80l27 46Zm0 0q11-3 21.5-4.5T480-640q11 0 21.5 1.5T523-634q-11-3-21.5-4.5T480-640q-11 0-21.5 1.5T437-634Zm-96 232q-5-9-9-18.5t-7-19.5q3 10 7 19.5t9 18.5q5 10 12 19t15 17q-8-8-15-17t-12-19Zm-16-118q3-11 7.5-21.5T342-561q5-9 11.5-17t14.5-16q-8 8-14.5 16T342-561q-5 9-9.5 19.5T325-520Zm157 200q-10 0-20.5-1.5T440-326q11 3 21.5 4.5T482-320q11 0 21-1.5t21-4.5q-11 3-21 4.5t-21 1.5Zm110-46q8-8 15-17t12-19q5-9 9.5-18.5T635-440q-2 10-6.5 19.5T619-402q-5 10-12 19t-15 17Zm43-154q-3-11-7.5-21.5T618-561q-5-9-11.5-17T592-594q8 8 14.5 16t11.5 17q5 9 9.5 19.5T635-520ZM480-400q33 0 56.5-23.5T560-480q0-33-23.5-56.5T480-560q-33 0-56.5 23.5T400-480q0 33 23.5 56.5T480-400Z"/>
        </svg>
        <p>四季の花</p>
      </a>
    </li>
    <li>
      <a href="#tagModal" class="footer__sp-nav-link tag-modal" title="タグ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="M570-104q-23 23-57 23t-57-23L104-456q-11-11-17.5-26T80-514v-286q0-33 23.5-56.5T160-880h286q17 0 32 6.5t26 17.5l352 353q23 23 23 56.5T856-390L570-104Zm-57-56 286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640ZM160-800Z"/>
        </svg>
        <p>タグ</p>
      </a>
    </li>
    <li>
      <a href="#searchModal" class="footer__sp-nav-link search-modal" title="検索">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
          <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
        </svg>
        <p>検索</p>
      </a>
    </li>
  </ul>
</footer>
<div id="searchModal" style="display:none;">
  <?php get_search_form(); ?>
  <p class="search-text">
    花の名前、色、季節などで検索
  </p>
</div>
<div id="tagModal" style="display:none;">
  <?php if (is_active_sidebar('modal')) : ?>
    <ul>
      <?php dynamic_sidebar('modal'); ?>
    </ul>
  <?php endif; ?>
</div>

<?php wp_footer(); ?>
</body>

</html>