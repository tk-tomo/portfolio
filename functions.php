<?php
// ===================== 基本セット =====================
// 絵文字無効化
add_action('init', 'kohi_wp_disable_emojis');
function kohi_wp_disable_emojis() {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
}

// グローバルスタイル無効化（FSEでない場合のみ有効）
add_action('wp_enqueue_scripts', 'kohi_remove_global_styles', 100);
function kohi_remove_global_styles() {
  wp_dequeue_style('global-styles');
}

// アイキャッチ画像（サムネイル）有効化
add_action('after_setup_theme', 'kohi_theme_setup');
function kohi_theme_setup() {
  add_theme_support('post-thumbnails');
}

add_theme_support('title-tag');

// サムネイルHTMLの width/height 属性を削除（関数名ユニーク化）
if (!function_exists('kohi_remove_thumbnail_dimensions')) {
  function kohi_remove_thumbnail_dimensions($html) {
    return preg_replace('/(width|height)=\"\d*\"\s/', '', $html);
  }
  add_filter('post_thumbnail_html', 'kohi_remove_thumbnail_dimensions', 10);
}

// Contact Form 7の自動整形を無効化（pタグ削除・関数名ユニーク化）
if (!function_exists('kohi_wpcf7_autop_return_false')) {
  function kohi_wpcf7_autop_return_false() { return false; }
  add_filter('wpcf7_autop_or_not', 'kohi_wpcf7_autop_return_false');
}

// ===================== ニュース（CPT + Tax） =====================
// ニュース（CPT）
add_action('init', function () {
  register_post_type('news', [
    'labels' => [
      'name'          => 'ニュース',
      'singular_name' => 'ニュース',
      'add_new_item'  => 'ニュースを追加',
      'edit_item'     => 'ニュースを編集',
    ],
    'public'        => true,
    'has_archive'   => true,
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-media-document',
    'supports'      => ['title','editor','thumbnail','excerpt','revisions'],
    'rewrite'       => ['slug' => 'news', 'with_front' => false],
    'show_in_rest'  => true,
  ]);
});

// ニュースカテゴリ（階層あり／複数選択OK）
add_action('init', function () {
  register_taxonomy('news_cat', ['news'], [
    'labels' => [
      'name'         => 'ニュースカテゴリ',
      'add_new_item' => 'カテゴリを追加',
      'edit_item'    => 'カテゴリを編集',
    ],
    'hierarchical' => true,
    'public'       => true,
    'show_ui'      => true,
    'show_in_rest' => true,
    'rewrite'      => ['slug' => 'news-category', 'with_front' => false],
  ]);
});

// ===================== ポートフォリオ（CPT + Tax） =====================
// カスタム投稿タイプ: ポートフォリオ作品（work）
add_action('init', function () {
  register_post_type('work', [
    'labels' => [
      'name'          => 'ポートフォリオ作品',
      'singular_name' => 'ポートフォリオ作品',
      'add_new_item'  => '新規作品を追加',
      'edit_item'     => '作品を編集',
      'all_items'     => '作品一覧',
    ],
    'public'            => true,
    'show_ui'           => true,
    'show_in_menu'      => true,
    'menu_position'     => 5,
    'menu_icon'         => 'dashicons-portfolio',
    'has_archive'       => true, // ← /work/ をALL一覧として使う
    'rewrite'           => ['slug' => 'work', 'with_front' => false],
    'supports'          => ['title','editor','excerpt','thumbnail','revisions'],
    'show_in_rest'      => true,
    'publicly_queryable'=> true,
    'hierarchical'      => false,
  ]);
});

// タクソノミー: ポートフォリオタイプ（work に紐付け）
add_action('init', function () {
  $labels = [
    'name'              => 'ポートフォリオタイプ',
    'singular_name'     => 'ポートフォリオタイプ',
    'menu_name'         => 'ポートフォリオタイプ',
    'search_items'      => 'タイプを検索',
    'all_items'         => 'すべてのタイプ',
    'parent_item'       => '親タイプ',
    'parent_item_colon' => '親タイプ:',
    'edit_item'         => 'タイプを編集',
    'update_item'       => 'タイプを更新',
    'add_new_item'      => '新規タイプを追加',
    'new_item_name'     => '新しいタイプ名',
    'not_found'         => 'タイプが見つかりません',
  ];

  register_taxonomy('portfolio_type', ['work'], [
    'labels'            => $labels,
    'public'            => true,
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'rewrite'           => [
      'slug'         => 'work-type', // /work-type/{term}/
      'with_front'   => false,
      'hierarchical' => true,
    ],
  ]);
});

// ===================== リライトルール更新（テーマ切替時） =====================
add_action('after_switch_theme', function () {
  do_action('init');
  flush_rewrite_rules(false);
});

function load_recaptcha_js() {
  // パスではなく、スラッグ（URLの末尾部分）だけを指定します
  if ( ! is_page( array( 'contact', 'contact_confirm' ) ) ) {
    wp_deregister_script( 'google-recaptcha' );
  }
}
add_action( 'wp_enqueue_scripts', 'load_recaptcha_js', 100 );
// function load_recaptcha_js() {
//  if ( ! is_page( 'portfolio/contact_confirm' ) ) {
//   wp_deregister_script( 'google-recaptcha' );
//  }
// }
// add_action( 'wp_enqueue_scripts', 'load_recaptcha_js',100 );