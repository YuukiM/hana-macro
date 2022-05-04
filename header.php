<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@2.0.2/destyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8cd2a8b7a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="slick/slick-theme.css">
    <script src="slick/slick.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="js/script.js"></script>
    <title>花マクロワールド</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">花マクロワールド</a>
        </h1>
        <ul class="header__nav">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa-solid fa-house-chimney header__icon"></i><p>Home</p></a></li>
            <li><a href="#"><i class="fa-solid fa-tags header__icon"></i><p>Tag</p></a></li>
            <li><a href="#"><i class="fa-solid fa-magnifying-glass header__icon"></i><p>Search</p></a></li>
        </ul>
    </header>
    <main class="main">
