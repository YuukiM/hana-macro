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