<?php
/* -----------------------------------------------------------------------
Setup
----------------------------------------------------------------------- */
function add_support()
{
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption',
      'style',
      'script'
    )
  );
  add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'add_support');


/* -----------------------------------------------------------------------
コンテンツ幅の設定
----------------------------------------------------------------------- */
function content_width()
{
  $GLOBALS['content_width'] = apply_filters('content_width', 640);
}
add_action('after_setup_theme', 'content_width', 0);


/* -----------------------------------------------------------------------
WordPressとプラグインのバージョン非表示
----------------------------------------------------------------------- */

remove_action('wp_head', 'wp_generator');

function remove_cssjs_ver2($src)
{
  if (strpos($src, 'ver='))
    $src = remove_query_arg('ver', $src);
  return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver2', 9999);
add_filter('script_loader_src', 'remove_cssjs_ver2', 9999);


/* -----------------------------------------------------------------------
デフォルトのファビコン無効化
----------------------------------------------------------------------- */

function disabled_favicon()
{
  exit;
}
add_action('do_faviconico', 'disabled_favicon');



/* -----------------------------------------------------------------------
絵文字機能無効化
https://gokansoichiro.com/blog/wordpress-emoji/
----------------------------------------------------------------------- */

function disabled_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disabled_emojis');
