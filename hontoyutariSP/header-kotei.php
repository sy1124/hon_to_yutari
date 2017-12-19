<!doctype html>
<html>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<meta charset="utf-8">
<title>
<?php
if( is_page( 'ABOUT')) {
echo "運営会社｜";
bloginfo( 'name' );
}elseif (is_page('PRIVACY')) {
echo "プライバシーポリシー｜";
bloginfo( 'name' );
}elseif (is_page('CONTACT')) {
echo "お問い合わせ｜";
bloginfo( 'name' );
}elseif (is_page('CON_THX')) {
echo "お問い合わせありがとうございました｜";
bloginfo( 'name' );
}elseif (is_page('PROJECT')){
echo "プロジェクト｜";
bloginfo( 'name' );
}
?>
</title>
<!--メタタグここから-->
<?php if(is_page( 'ABOUT') ) : ?>
<meta name="description" content="お問い合わせ｜本とゆたり">
<meta name="keywords" content="お問い合わせ｜本とゆたり">
<?php elseif (is_page( 'PRIVACY') ) :?>
<meta name="description" content="プライバシーポリシー｜本とゆたり">
<meta name="keywords" content="プライバシーポリシー｜本とゆたり">
<?php elseif (is_page( array('CONTACT', 'CON_THX'))) :?>
<meta name="description" content="お問い合わせ｜本とゆたり">
<meta name="keywords" content="お問い合わせ｜本とゆたり">
<?php elseif (is_page( 'PROJECT')) :?>
<meta name="description" content="プロジェクト｜本とゆたり">
<meta name="keywords" content="プロジェクト｜本とゆたり">
<?php endif; ?>
<meta name="viewport" content="width=device-width,minimum-scale=1.0,initial-scale=1.0,user-scalable=no">
<!--メタタグここまで-->

<!--favicon-->
<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/manifest.json">
<link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/data-common/favicons/safari-pinned-tab.svg" color="#da5443">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/data-common/favicons/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
<!--favicon-->

<!--cssここから-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common_page.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common_layout.css">
<?php if(is_page( 'ABOUT') ) : ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-about/css/policy_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-about/css/about.css">
<?php elseif (is_page( 'PRIVACY') ) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-about/css/policy_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-about/css/policy.css">
<?php elseif (is_page( array('CONTACT', 'CON_THX'))) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common-form.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-contact/css/contact.css">
<?php elseif (is_page( 'PROJECT') ) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-project/css/project_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-project/css/index.css">
<?php endif; ?>
<!--cssここまで-->

<!--スクリプトここから-->
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.placeholder.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/page_top.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/fixHeight.mod.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/import_script_sp.js"></script>
<!--スクリプトここまで-->

<!-- ogp -->
<?php if(is_page( 'PROJECT') ) : ?>
<meta property="og:title" content="プロジェクト｜本とゆたり">
<meta property="og:url" content="http://www.hontoyutari.com/project/index.html">
<meta property="og:image" content="http://www.hontoyutari.com/image/common/fbimage.png">
<meta property="og:type" content="article">
<meta property="og:site_name" content="本とゆたり">
<meta property="og:description" content="地域にあふれるいろいろなタカラ ヒト・モノ・コトのストーリーを編集し 皆さまのもとにお届けします。">
<?php else :?>
<meta property="og:title" content="本とゆたり">
<meta property="og:url" content="http://www.hontoyutari.com/">
<meta property="og:image" content="http://www.hontoyutari.com/image/common/fbimage.png">
<meta property="og:type" content="article">
<meta property="og:site_name" content="本とゆたり">
<meta property="og:description" content="地域にあふれるいろいろなタカラ ヒト・モノ・コトのストーリーを編集し皆さまのもとにお届けします。">
<?php endif; ?>
<!-- //ogp -->

</head>

<body>

<!--ラッパーここから-->
<div id="wrapper">

<!--ヘッダーここから-->
<header>
<div id="header_outline">

<div id="logo">
<a href="<?php bloginfo('url');?>/"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/header/logo.png" alt="本とゆたり" width="83" height="29"></a>
</div>

<div id="sub_nav">
<img src="<?php bloginfo('template_directory'); ?>/data-common/image/header/btn-sub_nav.png" width="38" height="38" alt="MENU">
</div>

<!--toggle_menuここから-->
<div id="toggle_menu">
<ul>
<li class="active"><a href="<?php bloginfo('url');?>/">HOME</a></li>
<li><a href="<?php bloginfo('url');?>/book/">BOOK</a></li>
<li><a href="<?php bloginfo('url');?>/goods/">GOODS</a></li>
<li><a href="<?php bloginfo('url');?>/project/">PROJECT</a></li>
<li><a href="<?php bloginfo('url');?>/shop/">SHOP-LIST</a></li>
<li><a href="<?php bloginfo('url');?>/about/">ABOUT US</a></li>
<li><a href="<?php bloginfo('url');?>/info/">INFORMATION</a></li>
<li><a href="<?php bloginfo('url');?>/contact/">CONTACT</a></li>
<li><a href="https://hontoyutari.stores.jp/" target="_blank">ONLINE STORE</a></li>
<li><a href="http://yutari.jp/" target="_blank">YUTARI</a></li>
</ul>
</div>
<!--toggle_menuここまで-->

</div>
</header>
<!--ヘッダーここまで-->
