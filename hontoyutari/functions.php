<?php
/* バージョン表記を削除 */
remove_action('wp_head','wp_generator');

/* jQueryのバージョンを設定 */
function my_scripts_method() {
	wp_deregister_script('jquery');	//WPでのjQuery読込を解除
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

/* wp_titleの半角スペースを削除 */
function my_title_fix($title, $sep, $seplocation){
	$title = str_replace(' '.$sep.' ', $sep, $title);
	return $title;
}
add_filter('wp_title', 'my_title_fix', 10, 3);

/* アーカイブの年月日表記を日本語化 */
function ja_date_wp_title($title, $sep, $seplocation) {
	$year = get_query_var('year');
	$monthnum = get_query_var('monthnum');
	$day = get_query_var('day');
	// from wp-includes/general-template.php:wp_title()
	if ( is_archive() && !empty($year) ) {
		$title = $year . "年";
	if ( !empty($monthnum) )
		$title .= zeroise($monthnum, 2) . "月";
	if ( !empty($day) )
		$title .= zeroise($day, 2) . "日";
		if ($seplocation == 'right') {
			$title = $title . '' . $sep . '';
		} else {
			$title = $sep . '' . $title . '';
		}
	}
	return $title;
}
add_filter('wp_title', 'ja_date_wp_title', 10, 3);

/* アイキャッチ画像設定 */
add_theme_support('post-thumbnails');

/* 抜粋の設定 */
function the_mbexcerpt($length) {	// <the_excerpt()> を <the_mbexcerpt(40);> に
	global $post;
	$content = strip_tags($post -> post_content);		// HTMLタグ、改行コードを除去
	$order = array('\r\n', '\n', '\r');
	$content = str_replace($order,'',$content);
	$mbexcerpt = mb_substr($content, 0, $length);
	if(mb_strlen($mbexcerpt) == $length){
		$mbexcerpt = $mbexcerpt .'…';				// テキストを省略した場合に文末記号を付加
	}
	echo $mbexcerpt;
}

/* キーワード検索をタイトルのみに変更 */
add_filter( 'posts_search', 'search_for_title' );
function search_for_title( $search ) {
	return preg_replace( "/ OR \([^\(\.]+.post_content LIKE '%.+%'\)/u", "", $search );
}

/*検索結果から’：’をはずす */
function search_wp_title( $title ) {
	if ( is_search() ) {
		$title = str_replace( ':', '', $title );
	}
	return $title;
}
add_filter( 'wp_title', 'search_wp_title' );

/* ページネートを数字リストで表示（nom_posts_pagination） */
function nom_posts_pagination($args = array()) {
	$navigation = '';
	if ($GLOBALS['wp_query'] -> max_num_pages > 1) {
		$args = wp_parse_args($args, array(
			'prev_text' => '<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/contents/btn-prev.png" width="40" height="40" alt="前へ">',
			'next_text' => '<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/contents/btn-next.png" width="40" height="40" alt="前へ">',
			'type' => 'plain'
		));
		if (isset($args['type']) && 'array' == $args['type']) $args['type'] = 'plain';
		$links = paginate_links($args);
		if ( $links ) $navigation = str_replace("'", '"', $links);
	}
	echo $navigation;
}

/* 日付比較 */
function day_diff($date1, $date2) {
	$timestamp1 = strtotime($date1);	// 日付をUNIXタイムスタンプに変換
	$timestamp2 = strtotime($date2);
	$seconddiff = abs($timestamp2 - $timestamp1);	// 何秒離れているかを計算
	$daydiff = $seconddiff / (60 * 60 * 24);	// 日数に変換
	return $daydiff;
}


/* カスタム投稿／分類追加『BOOK』 */
function book_post_type() {
	$labels = array(
		'name' => 'BOOK',
		'singular_name' => 'BOOK',
		'add_new_item' => '新規記事を追加',
		'add_new' => '新規追加',
		'parent_item' => '親記事',
		'new_item' => '新規記事',
		'view_item' => '記事を表示',
		'not_found' => '記事は見つかりませんでした',
		'not_found_in_trash' => 'ゴミ箱に記事はありません。',
		'search_items' => '記事を検索'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'capability_type' => 'post',
		'supports' => array('title','editor','thumbnail'),
		'menu_position' => 5,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'book','with_front' => false),
		'has_archive' => true
	);
	register_post_type('book', $args);
}
add_action('init', 'book_post_type', 0);

/* カスタム投稿／分類追加『GODDS』 */
function goods_post_type() {
	$labels = array(
		'name' => 'GOODS',
		'singular_name' => 'GOODS',
		'add_new_item' => '新規記事を追加',
		'add_new' => '新規追加',
		'parent_item' => '親記事',
		'new_item' => '新規記事',
		'view_item' => '記事を表示',
		'not_found' => '記事は見つかりませんでした',
		'not_found_in_trash' => 'ゴミ箱に記事はありません。',
		'search_items' => '記事を検索'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'capability_type' => 'post',
		'supports' => array('title','editor','thumbnail'),
		'menu_position' => 5,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'goods','with_front' => false),
		'has_archive' => true
	);
	register_post_type('goods', $args);

	$args = array(
		'label' => 'グッズカテゴリ',
		'labels' => array(
			'name' => 'グッズカテゴリ',
			'singular_name' => 'グッズカテゴリ',
			'search_items' => 'グッズカテゴリを検索',
			'popular_items' => 'よく使われているグッズカテゴリ',
			'all_items' => 'すべてのグッズカテゴリ',
			'edit_item' => 'グッズカテゴリの編集',
			'update_item' => '更新',
			'add_new_item' => 'グッズカテゴリを追加',
			'new_item_name' => '新しいグッズカテゴリ',
			'choose_from_most_used' => 'よく使われているグッズカテゴリから選択',
		),
		'public' => true,
		'show_ui' => true,
		'hierarchical' => true,
		'rewrite' => array('slug' => 'goods','with_front' => false)
	);
	register_taxonomy('goodscat', 'goods', $args);

}
add_action('init', 'goods_post_type', 0);

/* カスタム投稿／分類追加『SHOP』 */
function shop_post_type() {
	$labels = array(
		'name' => 'SHOP',
		'singular_name' => 'SHOP',
		'add_new_item' => '新規記事を追加',
		'add_new' => '新規追加',
		'parent_item' => '親記事',
		'new_item' => '新規記事',
		'view_item' => '記事を表示',
		'not_found' => '記事は見つかりませんでした',
		'not_found_in_trash' => 'ゴミ箱に記事はありません。',
		'search_items' => '記事を検索'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'capability_type' => 'post',
		'supports' => array('title','editor','thumbnail'),
		'menu_position' => 5,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'shop','with_front' => false),
		'has_archive' => true
	);
	register_post_type('shop', $args);

	$args = array(
		'label' => 'ショップカテゴリ',
		'labels' => array(
			'name' => 'ショップカテゴリ',
			'singular_name' => 'ショップカテゴリ',
			'search_items' => 'ショップカテゴリを検索',
			'popular_items' => 'よく使われているショップカテゴリ',
			'all_items' => 'すべてのショップカテゴリ',
			'edit_item' => 'ショップカテゴリの編集',
			'update_item' => '更新',
			'add_new_item' => 'ショップカテゴリを追加',
			'new_item_name' => '新しいショップカテゴリ',
			'choose_from_most_used' => 'よく使われているショップカテゴリから選択',
		),
		'public' => true,
		'show_ui' => true,
		'hierarchical' => true,
		'rewrite' => array('slug' => 'shop','with_front' => false)
	);
	register_taxonomy('shopcat', 'shop', $args);

}
add_action('init', 'shop_post_type', 0);

/* カスタム投稿／分類追加『PROJECT』 */
function pentry_post_type() {
	$labels = array(
		'name' => 'PROJECT',
		'singular_name' => 'PROJECT',
		'add_new_item' => '新規記事を追加',
		'add_new' => '新規追加',
		'parent_item' => '親記事',
		'new_item' => '新規記事',
		'view_item' => '記事を表示',
		'not_found' => '記事は見つかりませんでした',
		'not_found_in_trash' => 'ゴミ箱に記事はありません。',
		'search_items' => '記事を検索'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'capability_type' => 'post',
		'supports' => array('title','editor','thumbnail'),
		'menu_position' => 5,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'project/entry','with_front' => false),
		'has_archive' => true
	);
	register_post_type('pentry', $args);

	$args = array(
		'label' => 'プロジェクト名',
		'labels' => array(
			'name' => 'プロジェクト名',
			'singular_name' => 'プロジェクト名',
			'search_items' => 'プロジェクト名を検索',
			'popular_items' => 'よく使われているプロジェクト名',
			'all_items' => 'すべてのプロジェクト名',
			'edit_item' => 'プロジェクト名の編集',
			'update_item' => '更新',
			'add_new_item' => 'プロジェクト名を追加',
			'new_item_name' => '新しいプロジェクト名',
			'choose_from_most_used' => 'よく使われているプロジェクト名から選択',
		),
		'public' => true,
		'show_ui' => true,
		'hierarchical' => true,
		'rewrite' => array('slug' => 'project','with_front' => false)
	);
	register_taxonomy('prjctcat', 'pentry', $args);
}
add_action('init', 'pentry_post_type', 0);


/**
* 共通カスタム分類追加
* 『タグ』create_genepref
*/
function create_genepref() {
	$args = array(
		'label' => '都道府県',
		'labels' => array(
			'name' => '都道府県',
			'singular_name' => '都道府県',
			'search_items' => '都道府県を検索',
			'popular_items' => 'よく使われている都道府県',
			'all_items' => 'すべての都道府県',
			'edit_item' => '都道府県の編集',
			'update_item' => '更新',
			'add_new_item' => '都道府県を追加',
			'new_item_name' => '新しい都道府県',
			'choose_from_most_used' => 'よく使われている都道府県から選択',
		),
		'public' => true,
		'show_ui' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'pref')
	);
	register_taxonomy('genepref', array( 'book', 'shop', 'goods', 'pentry'), $args);
}
add_action('init', 'create_genepref', 0);

/**
* 共通カスタム分類追加
* 『タグ』create_genearea
*/
function create_genearea() {
	$args = array(
		'label' => '市町村',
		'labels' => array(
			'name' => '市町村',
			'singular_name' => '市町村',
			'search_items' => '市町村を検索',
			'popular_items' => 'よく使われている市町村',
			'all_items' => 'すべての市町村',
			'edit_item' => '市町村の編集',
			'update_item' => '更新',
			'add_new_item' => '市町村を追加',
			'new_item_name' => '新しい市町村',
			'choose_from_most_used' => 'よく使われている市町村から選択',
		),
		'public' => true,
		'show_ui' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'area')
	);
	register_taxonomy('genearea', array( 'book', 'shop', 'goods', 'pentry'), $args);
}
add_action('init', 'create_genearea', 0);


// カスタム投稿タイプの記事数をダッシュボードに表示
function hoge_dashboard_glance_items( $elements ) {
	foreach ( array( 'book', 'shop', 'goods', 'pentry') as $post_type ) { // カスタム投稿のラベル
		$name_posts = get_post_type_object( $post_type ) -> label;
		$num_posts = wp_count_posts( $post_type );
		if ( $num_posts && $num_posts -> publish ) {
			$text = $name_posts. '：' .number_format_i18n( $num_posts -> publish ). '件の投稿';
			$elements[] = sprintf( '<a href="edit.php?post_type=%1$s" class="%1$s-count">%2$s</a>', $post_type, $text );
		}
	}
	return $elements;
}
add_filter( 'dashboard_glance_items', 'hoge_dashboard_glance_items' );

if( function_exists('acf_add_options_page') ) {
    $option_page = acf_add_options_page(array(
        'page_title' => 'トップページ スライダー', // 設定ページで表示される名前
        'menu_title' => 'トップページ<br>スライダー', // ナビに表示される名前
        'menu_slug' => 'home_slider',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

function ps_number_cat( $post_type = 'post', $op = '<=' ,$cat_id = '1') {
	global $wpdb, $post;
	$categories = get_the_category($post->ID);
	$in_cat=0;
	foreach($categories as $category){if($category->term_id == $cat_id){$in_cat=1;}}
	if($in_cat){
	$post_type = is_array($post_type) ? implode("','", $post_type) : $post_type;
	$number = $wpdb->get_var("
		SELECT COUNT( * )
		FROM $wpdb->posts as p
		LEFT JOIN $wpdb->term_relationships as r ON p.ID = r.object_ID
		LEFT JOIN $wpdb->term_taxonomy as t ON r.term_taxonomy_id = t.term_taxonomy_id
		LEFT JOIN $wpdb->terms as terms ON t.term_id = terms.term_id
		WHERE post_date {$op} '{$post->post_date}'
		AND post_status = 'publish'
		AND post_type = ('{$post_type}')
		AND t.taxonomy = 'category' AND terms.term_id = '{$cat_id}'
	");
	return $number;
	}else{
	return "";
	}
}

//if分条件分岐で奇数・偶数
/* 奇数 */
function is_odd(){
    global $wp_query;
    return ((($wp_query->current_post+1) % 2) === 1);
}
/* 偶数 */
function is_even(){
    global $wp_query;
    return ((($wp_query->current_post+1) % 2) === 0);
}
//連番を振る
function getLoopIndex(){
    global $wp_query;
    return $wp_query->current_post;
}

function getLoopCount(){
    global $wp_query;
    return $wp_query->current_post+1;
}

//taxonomy内で何番目の記事かを取得
function post_number_in_cat($cat_slug) {
  global $wpdb, $post;
  print_r($wpdb);
  print_r($post);
  $number = $wpdb->get_var("
    SELECT COUNT(posts.ID)
    FROM $wpdb->posts posts
    INNER JOIN $wpdb->term_relationships rels ON posts.ID = rels.object_id
    INNER JOIN $wpdb->term_taxonomy tax ON rels.term_taxonomy_id = tax.term_taxonomy_id
    INNER JOIN $wpdb->terms terms ON tax.term_id = terms.term_ID
    WHERE terms.slug = '{$cat_slug}'
    AND posts.post_date <= '{$post->post_date}'
    AND posts.post_status = 'publish'
    AND posts.post_type = 'pentry'
  ;");
  return $number;
}

?>
