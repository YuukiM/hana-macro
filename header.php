<!DOCTYPE html>
<html lang="ja">
    <?php if ( is_home() ): ?>
        <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# website: http://ogp.me/ns/website#">
    <?php else: ?>
        <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# article: http://ogp.me/ns/article#">
    <?php endif; ?>
						<meta charset="UTF-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="twitter:card" content="summary" />
            <meta name="twitter:site" content="@myuuki_design" />
            <meta property="og:url" content="<?php echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
            <?php
            $the_query = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'pickUp',
                            'value' => 'pickup',
                            'compare' => 'LIKE'
                        )
                    )
                )
            );
            if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ){
                $the_query->the_post();
            }
            ?>
        <?php if ( is_home() ): ?>
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php bloginfo('name'); ?>" />
            <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
            <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
        <?php elseif( is_singular('information') ): ?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php echo get_the_title(); ?> | <?php bloginfo('name'); ?>" />
                <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
                    <?php endwhile;?>
                <?php endif; ?>
        <?php elseif( is_single() ): ?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php echo get_the_title().'のマクロ写真' ?> | <?php bloginfo('name'); ?>" />
                <meta property="og:description" content="<?php echo get_the_title().'のマクロ写真を無料ダウンロード' ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
            <?php endwhile;?>
            <?php endif; ?>
        <?php elseif( is_tag() ): ?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php single_tag_title(); echo 'の花の一覧' ?> | <?php bloginfo('name'); ?>" />
                <meta property="og:description" content="<?php single_tag_title(); echo "の花のマクロ写真を無料ダウンロード" ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
            <?php endwhile;?>
            <?php endif; ?>
        <?php elseif( is_category() ): ?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php single_cat_title(); echo 'に咲く花の一覧' ?> | <?php bloginfo('name'); ?>" />
                <meta property="og:description" content="<?php single_cat_title(); echo "に咲く花のマクロ写真を無料ダウンロード" ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
            <?php endwhile;?>
            <?php endif; ?>
        <?php elseif( is_404() ): ?>
            <meta property="og:type" content="article" />
            <meta property="og:title" content="お探しのページは見つかりませんでした。 | <?php bloginfo('name'); ?>" />
            <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
            <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
        <?php else: ?>
            <meta property="og:type" content=" article" />
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:title" content="<?php echo get_the_title(); ?> | <?php bloginfo('name'); ?>" />
                <meta property="og:description" content="<?php bloginfo('name'); ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
                <?php endwhile;?>
            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>
    <?php wp_reset_postdata(); ?>


    <?php if ( is_home() ): ?>
        <title><?php bloginfo('name'); ?> | <?php bloginfo( 'description' ); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <?php elseif( is_singular('information') ): ?>
        <title><?php echo get_the_title(); ?> | <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <?php elseif( is_singular('post') ): ?>
        <title><?php echo get_the_title().'のマクロ写真' ?> | <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php echo get_the_title()."のマクロ写真を無料ダウンロード" ?>" />
    <?php elseif( is_tag() ): ?>
        <title><?php single_tag_title(); echo 'の花の一覧' ?> | <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php single_tag_title(); echo "の花のマクロ写真を無料ダウンロード" ?>" />
    <?php elseif( is_category() ): ?>
        <title><?php single_cat_title(); echo 'に咲く花の一覧' ?> | <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php single_tag_title(); echo "に咲く花のマクロ写真を無料ダウンロード" ?>" />
    <?php elseif( is_404() ): ?>
        <title>お探しのページは見つかりませんでした | <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <?php else: ?>
        <title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <?php endif; ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header js-header">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="花マクロワールド">
	            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 635.57 124.07"><g id="a"/><g id="b"><g id="c"><g><path class="d" d="M76.95,59.89c-8.2,8.96-3.47,21.87-3.47,21.87,0,0,13.28,3.57,21.48-5.39,8.2-8.96,12.47-27.72,12.47-27.72,0,0-22.28,2.28-30.48,11.24Z"/><g><path class="d" d="M209.39,52.27c-.28,5.43-1.53,10.58-3.76,15.45-2.23,4.88-5.06,9.34-8.5,13.39-3.3,3.91-6.87,7.19-10.71,9.84-3.85,2.64-8.14,4.96-12.88,6.95,.82,.76,1.99,1.97,3.5,3.66,1.51,1.68,3.05,3.54,4.63,5.56,1.58,2.03,2.92,3.98,4.02,5.87,1.1,1.89,1.65,3.38,1.65,4.48,0,.41-.17,.74-.51,.98-.34,.24-.69,.36-1.03,.36s-.95-.29-1.8-.88c-.86-.58-1.7-1.22-2.52-1.91-.82-.69-1.37-1.13-1.65-1.34-2.54-2.06-5.29-4.14-8.24-6.23-2.95-2.09-5.77-4.07-8.45-5.92-2.06-1.44-4.52-2.97-7.36-4.58-2.85-1.61-5.73-3.16-8.65-4.63-2.92-1.48-5.51-2.69-7.78-3.66,1.37-1.65,2.63-3.38,3.76-5.2,1.13-1.82,2.35-3.59,3.66-5.3,3.98,1.72,7.98,3.95,12,6.7,4.02,2.75,7.67,5.53,10.97,8.34,2.47-1.78,5-4.08,7.57-6.9,2.58-2.82,4.98-5.92,7.21-9.32,2.23-3.4,4.1-6.81,5.61-10.25,1.51-3.43,2.44-6.66,2.78-9.68l-66.54,2.06v-6.28l83.02-1.54Z"/><path class="d" d="M284.06,45.99c-.55,3.71-1.54,7.72-2.99,12.05-1.44,4.33-3.12,8.55-5.05,12.67s-3.91,7.72-5.97,10.81c-4.95,7.55-10.78,14.28-17.51,20.19-6.73,5.91-14.52,10.13-23.38,12.67-1.85,.48-3.74,.89-5.66,1.24-1.92,.34-3.98,.69-6.18,1.03-.82,.07-1.7,.12-2.63,.16-.93,.03-1.7,.05-2.32,.05-.69,0-1.43-.09-2.21-.26-.79-.17-1.18-.46-1.18-.88,0-.62,.52-1.06,1.55-1.34,.62-.14,1.32-.31,2.11-.51,.79-.21,1.53-.38,2.21-.52,1.85-.48,3.88-1.13,6.08-1.96,2.2-.82,4.15-1.65,5.87-2.47,3.43-1.65,6.66-3.59,9.68-5.82,3.02-2.23,5.8-4.72,8.34-7.47,3.78-3.98,7.19-8.43,10.25-13.34,3.05-4.91,5.75-10.02,8.09-15.35,2.33-5.32,4.19-10.59,5.56-15.81h-25.03c-1.44,3.37-3.38,6.85-5.82,10.46-2.44,3.6-5.19,6.88-8.24,9.84-3.06,2.95-6.33,5.22-9.84,6.8-.48,.28-1.18,.5-2.11,.67-.93,.17-1.67,.26-2.21,.26-.14,0-.34-.07-.62-.21s-.41-.31-.41-.52c0-.34,.09-.63,.26-.88,.17-.24,.33-.46,.46-.67,1.99-2.27,4.02-4.91,6.08-7.93,2.06-3.02,3.91-6.18,5.56-9.48,1.78-3.5,3.3-7.07,4.53-10.71,.27-.69,.6-1.65,.98-2.88,.38-1.24,.74-2.49,1.08-3.76,.34-1.27,.58-2.35,.72-3.24l14.01,.82c-.21,.89-.52,1.91-.93,3.04s-.86,2.21-1.34,3.25h38.21Z"/><path class="d" d="M362.1,50.72c0,5.36-.07,11-.21,16.94-.14,5.94-.31,11.76-.51,17.46,0,2.06-.1,4.12-.31,6.18-.07,1.03-.19,2.04-.36,3.04-.17,1-.43,1.97-.77,2.94-1.3,3.98-3.78,6.83-7.42,8.55-3.64,1.72-7.79,2.58-12.46,2.58h-43.77l-.82-57.68h66.64Zm-54.38,5.36l.31,46.56h31c2.61,0,4.87-1.15,6.8-3.45,1.92-2.3,2.88-5.13,2.88-8.5,0-5.77,.05-11.54,.15-17.3,.1-5.77,.19-11.54,.26-17.3h-41.41Z"/><path class="d" d="M432.9,52.64c-.06,3.79-.53,7.7-1.4,11.76-.87,4.05-2.07,8-3.6,11.85-1.53,3.84-3.35,7.36-5.45,10.54-3.42,5.11-7.63,9.45-12.61,13.02-4.99,3.57-10.42,6.26-16.31,8.06-1.86,.54-3.79,.99-5.77,1.35-1.98,.36-3.96,.54-5.95,.54-.18,0-.58-.03-1.22-.09-.63-.06-.95-.24-.95-.54s.21-.51,.63-.63c.12-.12,.24-.18,.36-.18s.27-.03,.45-.09c3.66-1.14,7.27-2.7,10.81-4.69,9.19-4.99,16.05-11.49,20.59-19.51,4.53-8.02,7.16-17.1,7.88-27.25h-35.41l.9,18.92h-10.63l-.9-23.07h58.57Z"/><path class="d" d="M508.66,73.45l-3.51,7.66h-65.32l.09-7.66h68.75Z"/><path class="d" d="M531.27,57.5c-.06,4.75-.39,9.66-.99,14.73-.6,5.08-1.7,9.97-3.29,14.69-1.59,4.72-3.86,9.01-6.8,12.88-2.94,3.88-6.76,7.04-11.44,9.51-.24,.12-.86,.41-1.85,.86-.99,.45-1.64,.67-1.94,.67-.24,0-.47-.04-.68-.13-.21-.09-.32-.28-.32-.59,0-.12,.12-.33,.36-.63,.24-.3,.39-.48,.45-.54,.84-.78,1.64-1.53,2.39-2.25s1.46-1.53,2.12-2.43c1.5-2.04,2.82-4.29,3.96-6.76,2.1-4.56,3.59-9.02,4.46-13.38,.87-4.35,1.41-8.77,1.62-13.24,.21-4.47,.34-9.15,.41-14.01l11.53,.63Zm47.66,10.9c0,1.14-.15,2.55-.45,4.23-.3,1.68-.68,3.33-1.13,4.96-.45,1.62-.92,2.97-1.4,4.05-.96,2.28-2.01,4.39-3.15,6.31-1.14,1.92-2.58,3.78-4.32,5.59-3.91,4.03-8.5,7.33-13.79,9.91-5.29,2.58-10.75,4.05-16.4,4.42V49.66h10.81l-.36,47.39c2.94-1.08,5.93-2.69,8.96-4.82,3.03-2.13,5.86-4.52,8.47-7.16,2.61-2.64,4.73-5.29,6.35-7.93,.96-1.5,1.77-3.02,2.43-4.55,.66-1.53,1.32-3.11,1.98-4.73,.18-.36,.35-.62,.5-.77s.43-.23,.86-.23c.3,0,.48,.21,.54,.63,.06,.42,.09,.72,.09,.9Z"/><path class="d" d="M635.03,78.68c0,.3-.27,.65-.81,1.04-.54,.39-1.02,.68-1.44,.86-.42,.24-.96,.47-1.62,.68-.66,.21-1.32,.41-1.98,.59-1.8,.36-3.6,.57-5.41,.63-1.8,.06-3.33,.06-4.6,0-1.92-.12-4.04-.48-6.35-1.08-2.31-.6-4.43-1.47-6.35-2.61-2.82-1.56-5.08-3.24-6.76-5.05-.12-.12-.24-.24-.36-.36-.12-.12-.24-.24-.36-.36v39.92h-10.72V45.61h10.72v21.89c.78-.48,1.61-.99,2.48-1.53,.87-.54,1.88-1.2,3.02-1.98,1.26,1.68,2.76,3.3,4.5,4.87,1.74,1.56,3.12,2.67,4.15,3.33,1.56,1.08,3.47,2.03,5.72,2.84,2.25,.81,4.04,1.37,5.36,1.67,1.44,.3,2.87,.56,4.28,.77,1.41,.21,3.14,.41,5.18,.59,.9,.06,1.35,.27,1.35,.63Zm-10.99-38.56c0,.54-.17,1.41-.5,2.61-.33,1.2-.74,2.48-1.22,3.83-.48,1.35-.98,2.55-1.49,3.6-.51,1.05-.98,1.73-1.4,2.03-.48,.36-.9,.54-1.26,.54-.42,0-.69-.3-.81-.9-.12-.48-.21-1.02-.27-1.62-.06-.6-.15-1.14-.27-1.62-.24-1.44-.44-2.87-.58-4.28-.15-1.41-.32-2.84-.5-4.28-.06-.06-.09-.12-.09-.18,0-.24,.18-.36,.54-.36,.66-.12,1.76-.19,3.29-.23,1.53-.03,2.69-.04,3.47-.04,.72,0,1.08,.3,1.08,.9Zm11.53-.63c0,.54-.2,1.4-.59,2.57-.39,1.17-.87,2.45-1.44,3.83-.57,1.38-1.14,2.61-1.71,3.69-.57,1.08-1.07,1.77-1.49,2.07-.36,.36-.75,.54-1.17,.54-.24,0-.42-.09-.54-.27-.12-.18-.24-.39-.36-.63,0-.12-.06-.75-.18-1.89-.12-1.14-.26-2.45-.41-3.92-.15-1.47-.27-2.79-.36-3.96s-.13-1.88-.13-2.12c0-.3,.15-.48,.45-.54,.42-.12,1.08-.19,1.98-.22,.9-.03,1.82-.06,2.75-.09,.93-.03,1.61-.04,2.03-.04,.3,0,.57,.09,.81,.27,.24,.18,.36,.42,.36,.72Z"/></g><path class="d" d="M24.22,16.58c12.76-22.1-19.94-22.1-7.18,0-12.76-22.1-29.11,6.22-3.59,6.22-25.52,0-9.17,28.32,3.59,6.22-12.76,22.1,19.94,22.1,7.18,0,12.76,22.1,29.11-6.22,3.59-6.22,25.52,0,9.17-28.32-3.59-6.22Z"/><path class="d" d="M48.28,47.02c-1.89,3.1-3.92,6.13-6.07,9.1-2.15,2.97-4.43,5.87-6.84,8.71v57.95h-10.45v-46.72c-.77,.86-1.83,1.87-3.16,3.03-1.33,1.16-2.65,2.26-3.94,3.29-2.58,2.06-5.18,3.87-7.81,5.42-2.63,1.55-4.93,2.75-6.9,3.61-.17,.09-.43,.17-.77,.26-.34,.09-.6,.13-.77,.13-.77,0-1.16-.26-1.16-.77-.09-.17-.02-.36,.19-.58s.36-.41,.45-.58c2.41-2.07,4.8-4.3,7.16-6.71,2.37-2.41,4.67-4.99,6.9-7.74,4.21-5.08,8.17-10.5,11.87-16.26,3.7-5.76,6.8-11.36,9.29-16.78l12,4.65Zm-.8-20.65h21.58l2.19-19.36c2.24,.26,4.41,.52,6.52,.77,2.11,.26,4.24,.6,6.39,1.03,.17,0,.32,.02,.45,.06,.13,.04,.24,.06,.32,.06h.13c.26,0,.39,.34,.39,1.03,0,.6-.26,1.61-.77,3.03-.52,1.42-1.16,3.01-1.94,4.78-.77,1.76-1.53,3.42-2.26,4.97-.73,1.55-1.31,2.75-1.74,3.61h23.23c-.43-.6-.65-1.33-.65-2.19,0-2.15,.67-3.81,2-4.97,1.33-1.16,2.82-1.74,4.45-1.74s3.1,.56,4.39,1.68c1.29,1.12,1.94,2.67,1.94,4.65s-.65,3.51-1.94,4.84c-1.29,1.33-2.67,2-4.13,2h-31.49c-.43,.86-.97,1.92-1.61,3.16-.65,1.25-1.36,2.47-2.13,3.68-.35,.6-.69,1.14-1.03,1.61-.34,.47-.69,.93-1.03,1.36-.69,.86-1.42,1.29-2.19,1.29-.6,0-.9-.21-.9-.65v-1.42c0-.95,.13-2.28,.39-4,.26-1.72,.43-3.4,.52-5.03h-20.96c-.26,0-.47-.2-.47-.46l-.1-3.31c0-.27,.21-.49,.48-.49ZM121.46,106c0,1.64-.54,3.21-1.61,4.71-1.08,1.51-2.3,2.69-3.68,3.55-2.67,1.72-5.81,3.33-9.42,4.84-3.61,1.5-7.27,2.71-10.97,3.61-3.7,.9-7.1,1.35-10.2,1.35-4.39,0-8.71-.65-12.97-1.94-4.26-1.29-7.77-3.46-10.52-6.52-2.75-3.05-4.13-7.25-4.13-12.58,0-9.63-.02-19.29-.06-28.97-.04-9.68-.06-19.38-.06-29.1h10.97c0,7.83-.02,15.66-.06,23.49-.04,7.83-.06,15.62-.06,23.36,0,4.47,.19,8.28,.58,11.42,.39,3.14,1.25,5.7,2.58,7.68,1.33,1.98,3.46,3.42,6.39,4.32,2.92,.9,6.97,1.36,12.13,1.36,2.32,0,4.54-.09,6.65-.26,2.11-.17,4.19-.56,6.26-1.16,1.46-.34,3.03-.84,4.71-1.48,1.68-.64,3.33-1.48,4.97-2.52-2.32-1.03-3.48-2.75-3.48-5.16,0-1.81,.65-3.2,1.94-4.19,1.29-.99,2.62-1.48,4-1.48,1.46,0,2.84,.47,4.13,1.42,1.29,.95,1.94,2.37,1.94,4.26Z"/></g></g></g></svg>
						</a>
        </h1>
        <ul class="header__nav">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="ホーム"><i class="fa-solid fa-house-chimney header__icon"></i><p>ホーム</p></a></li>
            <li><a href="<?php echo esc_url( home_url() ); ?>/seasons/" title="四季の花一覧"><i class="fa-solid fa-sun header__icon"></i><p>四季の花</p></a></li>
            <li><a href="#tagModal" class="tag-modal" title="タグ"><i class="fa-solid fa-tags header__icon"></i><p>タグ</p></a></li>
            <?php if ( is_home() ): ?>
                <li><a href="#" class="js-home-search" title="検索"><label for="s"><i class="fa-solid fa-magnifying-glass header__icon"></i></label><p>検索</p></a></li>
            <?php else: ?>
                <li><a href="#searchModal" class="search-modal" title="検索"><i class="fa-solid fa-magnifying-glass header__icon"></i><p>検索</p></a></li>
            <?php endif; ?>
        </ul>
    </header>
    <main class="main">
