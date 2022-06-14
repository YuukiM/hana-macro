<!DOCTYPE html>
<html <?php language_attributes( $doctype ); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if ( is_home() ): ?>
        <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# website: http://ogp.me/ns/website#">
    <?php else: ?>
        <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# article: http://ogp.me/ns/article#">
    <?php endif; ?>
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
                <meta property="og:title" content="<?php echo get_the_title(); ?>" />
                <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
                    <?php endwhile;?>
                <?php endif; ?>
        <?php elseif( is_single() ): ?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php echo get_the_title().'のマクロ写真' ?>" />
                <meta property="og:description" content="<?php echo get_the_title().'のマクロ写真を無料ダウンロード' ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
            <?php endwhile;?>
            <?php endif; ?>
        <?php elseif( is_tag() ): ?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php single_tag_title(); echo 'の花の一覧' ?>" />
                <meta property="og:description" content="<?php single_tag_title(); echo "の花のマクロ写真を無料ダウンロード" ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
            <?php endwhile;?>
            <?php endif; ?>
        <?php elseif( is_category() ): ?>
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:type" content="article" />
                <meta property="og:title" content="<?php single_cat_title(); echo 'に咲く花の一覧' ?>" />
                <meta property="og:description" content="<?php single_cat_title(); echo "に咲く花のマクロ写真を無料ダウンロード" ?>" />
                <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
                <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
            <?php endwhile;?>
            <?php endif; ?>
        <?php elseif( is_404() ): ?>
            <meta property="og:type" content="article" />
            <meta property="og:title" content="お探しのページは見つかりませんでした。" />
            <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
            <meta property="og:image" content="<?php attachment_image('full', 'url'); ?>" />
        <?php else: ?>
            <meta property="og:type" content=" article" />
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <meta property="og:title" content="<?php echo get_the_title(); ?>" />
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
    <?php elseif( is_single() ): ?>
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
    <header class="header">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" width="180" height="35"></a>
        </h1>
        <ul class="header__nav">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house-chimney header__icon"></i><p>Home</p></a></li>
            <li><a href="#tagModal" class="tag-modal"><i class="fa-solid fa-tags header__icon"></i><p>Tag</p></a></li>
            <?php if ( is_home() ): ?>
                <li><a href="#"><i class="fa-solid fa-magnifying-glass header__icon"></i><p>Search</p></a></li>
            <?php else: ?>
                <li><a href="#searchModal" class="search-modal"><i class="fa-solid fa-magnifying-glass header__icon"></i><p>Search</p></a></li>
            <?php endif; ?>
        </ul>
    </header>
    <main class="main">
