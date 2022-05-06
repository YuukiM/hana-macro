<!DOCTYPE html>
<html <?php language_attributes( $doctype ); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@2.0.2/destyle.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/modaal.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8cd2a8b7a7.js" crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modaal.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
    <title>花マクロワールド</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">花マクロワールド</a>
        </h1>
        <ul class="header__nav">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house-chimney header__icon"></i><p>Home</p></a></li>
            <li><a href="#"><i class="fa-solid fa-tags header__icon"></i><p>Tag</p></a></li>
            <?php if ( is_home() ): ?>
                <li><a href="#"><i class="fa-solid fa-magnifying-glass header__icon"></i><p>Search</p></a></li>
            <?php else: ?>
                <li><a href="#searchModal" class="search-modal"><i class="fa-solid fa-magnifying-glass header__icon"></i><p>Search</p></a></li>
            <?php endif; ?>
        </ul>
    </header>
    <main class="main">
