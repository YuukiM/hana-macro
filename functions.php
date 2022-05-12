<?php

function enqueue_scripts(){
    // css
    wp_enqueue_style("style",get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');

/*【出力カスタマイズ】検索対象をカスタム投稿タイプで絞り込む */
function my_pre_get_posts($query) {
    if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
        $query->set( 'post_type', array('post') );
    }
}
add_action( 'pre_get_posts','my_pre_get_posts' );

//サイト内検索のカスタマイズ
function custom_search($search, $wp_query) {
    global $wpdb;

    //検索ページ以外だったら終了
    if (!$wp_query->is_search)
        return $search;

    if (!isset($wp_query->query_vars))
        return $search;

    // タグ名・カテゴリ名・カスタムフィールド も検索対象にする
    $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
    if ( count($search_words) > 0 ) {
        $search = '';
        foreach ( $search_words as $word ) {
            if ( !empty($word) ) {
                $search_word = $wpdb->escape("%{$word}%");
                $search .= " AND (
						{$wpdb->posts}.post_title LIKE '{$search_word}'
						OR {$wpdb->posts}.post_content LIKE '{$search_word}'
						OR {$wpdb->posts}.ID IN (
							SELECT distinct r.object_id
							FROM {$wpdb->term_relationships} AS r
							INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
							INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
							WHERE t.name LIKE '{$search_word}'
						OR t.slug LIKE '{$search_word}'
						OR tt.description LIKE '{$search_word}'
						)
						OR {$wpdb->posts}.ID IN (
							SELECT distinct p.post_id
							FROM {$wpdb->postmeta} AS p
							WHERE p.meta_value LIKE '{$search_word}'
						)
				) ";
            }
        }
    }

    return $search;
}
add_filter('posts_search','custom_search', 10, 2);


// ウィジェット
function theme_widgets_init(){
    register_sidebar(array(
        'name'=>'モーダル内',
        'id'=>'modal',
    ));
}
add_action('widgets_init','theme_widgets_init');

// メニュー
function register_my_menus() {
    register_nav_menus( array( //複数のナビゲーションメニューを登録する関数
        //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
        'main-menu' => 'Main Menu',
        'footer-menu'  => 'Footer Menu',
    ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );

function attachment_image($size, $type) {
    $image_field = get_field('post-image');

    $image_size = $size; // (thumbnail, medium, large, full or custom size)
    $img_attr = array(
        'src'   => $src,	// アイキャッチ画像の URL
        'class' => "attachment-$image_size",	// 指定した大きさ
        'alt'   => get_the_title().'のマクロ写真',	// アイキャッチ画像の抜粋
        'title' => get_the_title().'のマクロ写真',	// アイキャッチ画像のタイトル
    );
    $image = wp_get_attachment_image( $image_field, $image_size, false, $img_attr );
    $url = wp_get_attachment_image_src( $image_field, $size);

    if ($type == 'url') {
        echo $url[0];
    } elseif ($type == 'img') {
        echo $image;
    } else {
        echo $image;
    }
}