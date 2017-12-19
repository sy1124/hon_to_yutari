<!doctype html>
<html>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">
<title>
  <?php
  if( is_post_type_archive( 'goods'))
  {
  echo "グッズ｜"; bloginfo( 'name' );
  }
  elseif (is_post_type_archive('book'))
  {
  echo "書籍｜"; bloginfo( 'name' );
  }
  elseif (is_post_type_archive('shop'))
  {
  echo "ショップ｜"; bloginfo( 'name' );
  }
  elseif (is_tax(array('shopcat', 'genepref', 'genearea')))
  {
  echo "ショップ｜";
  bloginfo( 'name' );
  }
  elseif (is_tax('prjctcat'))
  {
  single_cat_title(); echo "｜プロジェクト｜"; bloginfo( 'name' );
  }
  elseif (is_search())
  {
  wp_title('｜', true, 'right'); echo "ショップ｜"; bloginfo('name');
  }
  elseif (is_category())
  {
    echo "インフォメーション｜"; bloginfo( 'name' );
  }
  elseif (is_archive())
  {
    echo "インフォメーション｜"; bloginfo( 'name' );
  }
  elseif (is_404())
  {
    echo 'ページが見つかりません。';
  }
  ?>
</title>

<!--メタタグここから-->
<?php if(is_post_type_archive( 'goods') ) : ?>
<meta name="description" content="<?php echo"グッズ｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo"グッズ｜"; bloginfo( 'name' );?>">
<?php elseif (is_post_type_archive( 'book') ) :?>
<meta name="description" content="<?php echo"書籍｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo"書籍｜"; bloginfo( 'name' );?>">
<?php elseif (is_post_type_archive( 'shop') ) :?>
<meta name="description" content="<?php echo"ショップ｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo"ショップ｜"; bloginfo( 'name' );?>">
<?php elseif (is_tax( 'shopcat') ) :?>
<meta name="description" content="<?php echo"ショップ｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo"ショップ｜"; bloginfo( 'name' );?>">
<?php elseif (is_tax(array('shopcat', 'genepref', 'genearea')) ) :?>
<meta name="description" content="<?php echo"ショップ｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo"ショップ｜"; bloginfo( 'name' );?>">
<?php elseif (is_tax( 'prjctcat') ) :?>
<meta name="description" content="<?php single_cat_title(); echo "｜プロジェクト｜"; bloginfo( 'name' ); ?>">
<meta name="keywords" content="<?php single_cat_title(); echo "｜プロジェクト｜"; bloginfo( 'name' ); ?>">
<?php elseif (is_search() ) :?>
<meta name="description" content="<?php wp_title('｜', true, 'right'); echo "ショップ｜"; bloginfo('name'); ?>">
<meta name="keywords" content="<?php wp_title('｜', true, 'right'); echo "ショップ｜"; bloginfo('name'); ?>">
<?php elseif(is_category()) : ?>
<meta name="description" content="<?php echo "インフォメーション｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo "インフォメーション｜"; bloginfo( 'name' );?>">
<?php elseif(is_archive()) : ?>
<meta name="description" content="<?php echo "インフォメーション｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo "インフォメーション｜"; bloginfo( 'name' );?>">
<?php elseif(is_404()) : ?>
<meta name="description" content="<?php echo "404 Not Found.｜"; bloginfo( 'name' );?>">
<meta name="keywords" content="<?php echo "404 Not Found.｜"; bloginfo( 'name' );?>">
<?php endif; ?>
<meta name="viewport" content="width=1515">
<!--メタタグここまで-->

<!--OGPここから-->
<?php if (is_tax( 'prjctcat') ) :?>
<meta property="og:title" content="<?php single_cat_title(); ?><?php echo "｜プロジェクト｜";?><?php bloginfo( 'name' ); ?>">
<meta property="og:url" content="<?php echo get_permalink(); ?>">
<meta property="og:image" content="<?php the_post_thumbnail_url('full'); ?>">
<meta property="og:type" content="article">
<meta property="og:site_name" content="本とゆたり">
<?php endif; ?>
<?php if(is_tax('prjctcat') ) : ?>
<meta property="og:description" content="<?php $txt = get_field('project_shousai'); echo "$txt";?>" />
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
<?php elseif (is_tax( array('shopcat', 'genepref', 'genearea')) ) :?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common_form.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-shop/css/shop_common.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-shop/css/index.css">
<?php elseif (is_tax( 'prjctcat') ) :?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-project/css/project_common.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-project/css/project_list.css">
<?php elseif (is_search() ) :?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common_form.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-shop/css/shop_common.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-shop/css/index.css">
<?php elseif(is_category()) : ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-info/css/info.css">
<?php elseif(is_archive()) : ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-info/css/info.css">
<?php elseif(is_404()) : ?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-info/css/info.css">
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
