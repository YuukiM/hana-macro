<?php

// css 読み込み
function enqueue_styles()
{
	wp_enqueue_style('style', get_stylesheet_uri(), array(), filemtime(get_theme_file_path('style.css')));
}

add_action('wp_enqueue_scripts', 'enqueue_styles');

// jQueryカット
// 一時停止中 フォームが動かないので
if (!is_admin()) {
	function my_scripts()
	{
		wp_deregister_script('jquery');
		wp_deregister_script('jquery-migrate');
		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.7.1', false);
		wp_enqueue_script('modaal', get_template_directory_uri() . '/js/modaal.min.js', array(), '0.4.4', true);
		wp_enqueue_script('slick', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), '10.3.1', true);
		wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true);
	}

	add_action('wp_enqueue_scripts', 'my_scripts');
}

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');

/*【出力カスタマイズ】検索対象をカスタム投稿タイプで絞り込む */
function my_pre_get_posts($query)
{
	if (!is_admin() && $query->is_main_query() && $query->is_search()) {
		$query->set('post_type', array('post'));
	}
}

add_action('pre_get_posts', 'my_pre_get_posts');

//サイト内検索のカスタマイズ
function custom_search($search, $wp_query)
{
	global $wpdb;

	//検索ページ以外だったら終了
	if (!$wp_query->is_search)
		return $search;

	if (!isset($wp_query->query_vars))
		return $search;

	// タグ名・カテゴリ名・カスタムフィールド も検索対象にする
	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
	if (count($search_words) > 0) {
		$search = '';
		foreach ($search_words as $word) {
			if (!empty($word)) {
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

add_filter('posts_search', 'custom_search', 10, 2);


// ウィジェット
function theme_widgets_init()
{
	register_sidebar(array(
		'name' => 'モーダル内',
		'id' => 'modal',
	));
}

add_action('widgets_init', 'theme_widgets_init');

// メニュー
function register_my_menus()
{
	register_nav_menus(array( //複数のナビゲーションメニューを登録する関数
		//'「メニューの位置」の識別子' => 'メニューの説明の文字列',
		'main-menu' => 'Main Menu',
		'footer-menu' => 'Footer Menu',
	));
}

add_action('after_setup_theme', 'register_my_menus');

/* 画像表示処理 */
function attachment_image($size, $type)
{
	$image_field = get_field('post-image');

	$image_size = $size; // (thumbnail, medium, large, full or custom size)
	$img_attr = array(
		//'src'   => $src,	// アイキャッチ画像の URL
		'class' => "attachment-$image_size",    // 指定した大きさ
		'alt' => get_the_title() . 'のマクロ写真',    // アイキャッチ画像の抜粋
		'title' => get_the_title() . 'のマクロ写真',    // アイキャッチ画像のタイトル
	);
	$image = wp_get_attachment_image($image_field, $image_size, false, $img_attr);
	$url = wp_get_attachment_image_src($image_field, $size);

	if ($type === 'url') {
		echo $url[0];
	} elseif ($type === 'img') {
		echo $image;
	} else {
		echo $image;
	}
}

/* EXIFデータ */
function image_metadata($exif)
{
	require_once ABSPATH . '/wp-admin/includes/image.php';
	$image_field = get_field('post-image');
	$type = get_post_mime_type($image_field);
	$attachment_path = get_attached_file($image_field);
	$metadata = wp_read_image_metadata($attachment_path);
	if ('image/jpeg' == $type) {
		if ($metadata) {
			return $metadata[$exif];
		}
	}
}

/* マクロ写真かどうかでタイトルの後ろのテキストを変える */
function title_postfix(): void
{
	$is_not_macro = get_field('non-macro');
	if ($is_not_macro[0] === 'nonMacro') {
		//マクロ写真じゃないとき
		echo 'の写真';
	} else {
		//マクロ写真の時
		echo 'のマクロ写真';
	}
}

/* 検索方式を「LIKE」から「LIKE BINARY」へ変更するコード */
function mycus_change_LIKE_BINARY_search($where, WP_Query $q)
{
	if ($q->is_search() && $q->is_main_query() && !$q->is_admin()) {
		$where = str_replace('LIKE', 'LIKE BINARY', $where);
	}
	return $where;
}

add_filter('posts_where', 'mycus_change_LIKE_BINARY_search', 10, 2);


/* 管理画面での表示項目追加 */
function add_custom_column($columns) {
	$columns['post-image'] = '画像';
	$columns['sliderDisplay'] = 'スライダーに表示';
	$columns['pickupDisplay'] = 'ピックアップに表示';
	return $columns;
}

function add_custom_column_id($column_name, $id) {

	if ($column_name == 'post-image') {
		$cf_column = get_field('post-image', $id);
		$url = wp_get_attachment_image_src($cf_column);
		echo '<img src="' . $url[0] . '" width="100" height="100">';
	}
	if ($column_name == 'sliderDisplay') {
		$cf_column = get_field('sliderDisplay', $id);
		if ($cf_column[0] == 'display') {
			$display = '表示する';
		}
		echo $display;
	}
	if ($column_name == 'pickupDisplay') {
		$cf_column = get_field('pickUp', $id);
		if ($cf_column[0] == 'pickup') {
			$display = 'ピックアップ';
		}
		echo $display;
	}

}

add_filter('manage_posts_columns', 'add_custom_column');
add_action('manage_posts_custom_column', 'add_custom_column_id', 10, 2);

/* シャッタースピード変換 */
function shutterSpeeds($value) {
	$shutterSpeeds = array(
		'0.76923076923077' => '1/1.3',
		'0.625' => '1/1.6',
		'0.5' => '1/2',
		'0.4' => '1/2.5',
		'0.3125' => '1/3.2',
		'0.25' => '1/4',
		'0.2' => '1/5',
		'0.16666666666667' => '1/6',
		'0.125' => '1/8',
		'0.1' => '1/10',
		'0.076923076923077' => '1/13',
		'0.066666666666667' => '1/15',
		'0.05' => '1/20',
		'0.04' => '1/25',
		'0.033333333333333' => '1/30',
		'0.025' => '1/40',
		'0.02' => '1/50',
		'0.016666666666667' => '1/60',
		'0.0125' => '1/80',
		'0.01' => '1/100',
		'0.008' => '1/125',
		'0.00625' => '1/160',
		'0.005' => '1/200',
		'0.004' => '1/250',
		'0.003125' => '1/320',
		'0.0025' => '1/400',
		'0.002' => '1/500',
		'0.0015625' => '1/640',
		'0.00125' => '1/800',
		'0.001' => '1/1000',
		'0.0008' => '1/1250',
		'0.00076923076923077' => '1/1300',
		'0.000625' => '1/1600',
		'0.0005' => '1/2000',
		'0.0004' => '1/2500',
		'0.0003125' => '1/3200',
		'0.00025' => '1/4000',
		'0.0002' => '1/5000',
		'0.00015625' => '1/6400',
		'0.000125' => '1/8000',
		'0.0001' => '1/10000',
	);

	if ($shutterSpeeds[$value]) {
		// 上記の中にあれば分数表記
		echo $shutterSpeeds[$value];
	} else {
		// 無ければ取得してきた小数でそのまま表記
		echo $value;
	}
}


//「Wordpress本体」の自動更新メール通知を停止する
add_filter('auto_core_update_send_email', '__return_false');
// 「プラグイン」の自動更新メール通知を停止する
add_filter('auto_plugin_update_send_email', '__return_false');

// 「テーマ」の自動更新メール通知を停止する
add_filter('auto_theme_update_send_email', '__return_false');