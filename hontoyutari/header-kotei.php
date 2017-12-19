<!doctype html>
<html>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
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
<meta name="viewport" content="width=1515">
<!--メタタグここまで-->

<!--OGPここから-->
<?php if(is_page( 'PROJECT') ) : ?>
<meta property="og:title" content="プロジェクト｜本とゆたり">
<meta property="og:url" content="http://www.hontoyutari.com/project/index.html">
<meta property="og:image" content="http://www.hontoyutari.com/image/common/fbimage.png">
<meta property="og:type" content="article">
<meta property="og:site_name" content="本とゆたり">
<meta property="og:description" content="地域にあふれるいろいろなタカラ ヒト・モノ・コトのストーリーを編集し 皆さまのもとにお届けします。">
<?php endif; ?>
<!--OGPここまで-->

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
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/css01.css">
<?php if(is_page( 'ABOUT') ) : ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-about/css/aboutLayout.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-about/css/about.css">
<?php elseif (is_page( 'PRIVACY') ) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-privacy/css/privacy.css">
<?php elseif (is_page( array('CONTACT', 'CON_THX'))) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common_form.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-contact/css/contact_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-contact/css/contact.css">
<?php elseif (is_page( 'PROJECT') ) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-project/css/project_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-project/css/index.css">
<?php endif; ?>
<!--cssここまで-->

<!--スクリプトここから-->
<!--[if lt IE 9]><script src="../common/js/IE9.js"></script><![endif]-->
<!--[if lt IE 8]><script src="../common/js/selectivizr-1.0.2.js"></script><![endif]-->
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/smartRollover.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.placeholder.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/page_top.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/fixHeight.mod.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.sidebar.fix.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/import_script_pc.js"></script>
<!--スクリプトここまで-->

</head>
