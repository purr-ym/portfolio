<?php
require get_template_directory() . '/template-parts/functions/setup.php';


// ファビコンとアップルタッチアイコンの設置
function add_site_icon()
{
  $favicon = get_theme_file_uri('favicon.png');

  echo <<<EOM
    <link rel="shortcut icon" href="{$favicon}">\n
  EOM;
}
add_action('wp_head', 'add_site_icon', 99);


/* -----------------------------------------------------------------------
CSSとJavaScriptの読み込み
----------------------------------------------------------------------- */

function theme_scripts()
{
  wp_enqueue_style('style', get_theme_file_uri('/assets/css/app.css'));
}
add_action('wp_enqueue_scripts', 'theme_scripts');


/* -----------------------------------------------------------------------
ショートコード
----------------------------------------------------------------------- */

// [img]
function shortcode_img()
{
  return get_theme_file_uri('/assets/images');
}
add_shortcode('img', 'shortcode_img');
