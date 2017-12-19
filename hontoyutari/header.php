<!doctype html>
<html>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">
<title>
  <?php
  if( is_post_type_archive( 'goods')) {
  echo "グッズ｜";
  bloginfo( 'name' );
  }elseif (is_post_type_archive('book')) {
  echo "書籍｜";
  bloginfo( 'name' );
  }
  elseif (is_post_type_archive('shop')) {
  echo "ショップ｜";
  bloginfo( 'name' );
}
  ?>
</title>
<?php if(is_post_type_archive( 'goods') ) : ?>
  <meta name="description" content="グッズ｜本とゆたり">
  <meta name="keywords" content="グッズ｜本とゆたり">
<?php elseif (is_post_type_archive( 'book') ) :?>
  <meta name="description" content="書籍｜本とゆたり">
  <meta name="keywords" content="書籍｜本とゆたり">
<?php elseif (is_post_type_archive( 'shop') ) :?>
  <meta name="description" content="ショップ｜本とゆたり">
  <meta name="keywords" content="ショップ｜本とゆたり">
<?php endif; ?>
<meta name="viewport" content="width=1515">

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/css01.css">
<?php if(is_post_type_archive( 'goods') ) : ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-goods/css/goods_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-goods/css/index.css">
<?php elseif (is_post_type_archive( 'book') ) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-book/css/book_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-book/css/index.css">
<?php elseif (is_post_type_archive( 'shop') ) :?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common_form.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-shop/css/shop_common.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-shop/css/index.css">

<?php endif; ?>

<!--スクリプトここから-->
<!--[if lt IE 9]><script src="../common/js/IE9.js"></script><![endif]-->
<!--[if lt IE 8]><script src="../common/js/selectivizr-1.0.2.js"></script><![endif]-->
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/smartRollover.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.placeholder.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.customSelect-0.5.1.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/page_top.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/fixHeight.mod.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.sidebar.fix.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/import_script_pc.js"></script>
<!--スクリプトここまで-->

</head>
