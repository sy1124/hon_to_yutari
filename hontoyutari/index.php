<!doctype html>
<html>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">
<title><?php wp_title( '--', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
<meta name="description" content="本とゆたり">
<meta name="keywords" content="本とゆたり">
<meta name="viewport" content="width=1515">


<meta property="og:title" content="本とゆたり">
<meta property="og:url" content="http://www.hontoyutari.com/">
<meta property="og:image" content="http://www.hontoyutari.com/image/common/fbimage.png">
<meta property="og:type" content="website">
<meta property="og:site_name" content="本とゆたり">
<meta property="og:description" content="地域にあふれるいろいろなタカラ ヒト・モノ・コトのストーリーを編集し 皆さまのもとにお届けします。" />

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

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/css01.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-index/css/toppage.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-common/css/common_form.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/data-index/css/jquery.bxslider.css">

<!--スクリプトここから-->
<!--[if lt IE 9]><script src="../common/js/IE9.js"></script><![endif]-->
<!--[if lt IE 8]><script src="../common/js/selectivizr-1.0.2.js"></script><![endif]-->
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/smartRollover.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.placeholder.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.bxslider.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/page_top.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/fixHeight.mod.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/jquery.sidebar.fix.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/data-common/js/import_script_pc.js"></script>
<!--スクリプトここまで-->

</head>

<body>
  <?php include_once("/usr/home/aa210uz1th/html/google/analyticstracking.php") ?>

  <!--FB埋め込み-->
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.6&appId=1752603118295161";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <!--FB埋め込み-->

<!--ラッパーここから-->


<div id="wrapper">

  <!--サイドバーここから-->
  <?php get_sidebar(); ?>
  <!--サイドバーここまで-->

  <!--コンテナーここから-->
  <div id="container">

   <!--トップースライダー(flexslider)ここから-->
        <ul class="bxslider">
          <?php if(have_rows('top_slider',698)) : ?>
          <?php while(have_rows('top_slider',698)) : the_row(); ?>
          <?php $pic= get_sub_field('top_slide_img');?>
          <?php $links= get_sub_field('top_slide_link');?>

          <li>
            <?php if($links) :?>
            <a href="<?php echo $links ;?>">
              <img src="<?php echo $pic;?>" alt="" width="" height="">
            </a>
            <?php else :?>
              <img src="<?php echo $pic;?>" alt="" width="" height="">
            <?php endif;?>
          </li>

          <?php endwhile; ?>
          <?php endif;?>
        </ul>
        <div id="slider_logo">
          <img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/logo.png" width="" height="" alt="本とゆたり　BOOK AND YUTARI">
          <a class="opa" href="https://hontoyutari.stores.jp/" target="_blank">
          <img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/btn-online_store.png" width="" height="" alt="ONLINE STORE"></a>
        </div>
    <!--トップースライダー(flexslider)ここまで-->

    <!--メインここから-->
    <div class="main">

      <article>
        <section>

          <!--コンテンツここから-->
          <div class="content_outline">




            <!--メインメニューここから-->
            <div id="main_menu">
              <table>
                <tr>
                  <td><a href="<?php bloginfo('url'); ?>/book/"><img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/btn-book.png" width="85" height="107" alt="BOOK"></a></td>
                  <td><a href="<?php bloginfo('url'); ?>/goods/"><img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/btn-goods.png" width="86" height="107" alt="GOODS"></a></td>
                  <td><a href="<?php bloginfo('url'); ?>/project/"><img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/btn-project.png" width="86" height="107" alt="PROJECT"></a></td>
                  <td><a href="<?php bloginfo('url'); ?>/shop/"><img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/btn-shop_list.png" width="96" height="107" alt="SHOP LIST"></a></td>
                </tr>
              </table>
            </div>
            <!--メインメニューここまで-->

            <!--プロジェクトここから-->
            <div id="project">

              <div class="column_3">

                <?php $the_query = new WP_Query( array('posts_per_page' => 3, 'post_type' => 'page', 'orderby' =>'date', 'post_parent' => 504)); ?>
                <?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php $pageslug = $post->post_name; ?>

                <div class="box">
                  <a href="<?php bloginfo(url);?>/project/<?php echo $pageslug;?>">
                  <div class="inner">
                    <img src="<?php the_field('prjct-img'); ?>">
                      <div class="icon_new">
                        <?php
                        $today = date("Y-m-d");
                        $posted = get_the_date('Y-m-d',$postoid);
                        $day = day_diff($today, $posted);
                        ?>
                        <?php
                        if($day <30):
                        ?>
                        <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
                        <?php endif; ?>
                      </div>
                    <!--<img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/img-pj_01.png" width="320" height="457" alt="">-->
                  </div>
                  </a>
                  <a href="<?php bloginfo(url);?>/project/<?php echo $pageslug;?>">
                  <div class="category">
                    <?php the_field('prjct-name');?>
                  </div>
                  </a>
                </div>
                <?php endwhile; endif; ?>
                <?php wp_reset_postdata(); ?>

              </div>

            </div>
            <!--プロジェクトここまで-->

            <!--本とゆたりの商品ここから-->
            <div id="book_goods">

              <div class="main_ttl">
                <img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/ttl-book_goods.png" width="205" height="108" alt="BOOK &amp; GOODS 本とゆたりの商品">
              </div>

              <div class="column_3 fixHeight">

                <?php $the_query = new WP_Query( array('posts_per_page' => 3, 'post_type' => array('book','goods'), 'orderby' =>'date')); ?>
                <?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php $pageslug = $post->post_name; ?>
                <?php $postoid = $post->ID ;?>
                <div class="box">
                  <a href="<?php the_permalink(); ?>">
                  <div class="inner">
                              <div class="icon_new">
                                <?php
                                $today = date("Y-m-d");
                                $posted = get_the_date('Y-m-d',$postoid);
                                $day = day_diff($today, $posted);
                                ?>
                                <?php
                                if($day <30):
                                ?>
                                <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
                                <?php endif; ?>
                              </div>
                      <?php the_post_thumbnail(array(280,280)); ?>
                      </div>
                      </a>
                    <div class="more">
                      <div class="category fixHeightChild_01">
                        <?php if (get_field('book-sub')):?>
                        <?php $sub = get_field('book-sub');?>
                        <?php echo $sub ;?>
                      <?php endif;?>
                      </div>
                        <a href="<?php the_permalink(); ?>">
                      <div class="ttl  fixHeightChild_02">
                        <?php $Ptype = get_post_type(); ?>
                           <?php the_field($Ptype.'-title') ;?>
                      </div>
                      </a>
                    </div>
                </div>
                <?php endwhile; endif; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            </div>
            <!--本とゆたりの商品ここまで-->

            <!--ショップリストここから-->
            <div id="shop_list">

              <div class="main_ttl">
                <img src="<?php bloginfo('template_directory'); ?>/data-index/image/main/ttl-book_shop_list.png" width="276" height="102" alt="SHOP-LIST 本とゆたりの商品を扱っていただいてます">
              </div>

              <div class="column_3 fixHeight">

                <?php $the_query = new WP_Query( array('posts_per_page' => 3, 'post_type' => 'shop', 'orderby' =>'date')); ?>
                <?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php $pageslug = $post->post_name; ?>
                <?php $postoid = $post->ID ;?>
                <div class="box">
                  <a href="<?php echo get_permalink(); ?>">
                  <div class="inner">

                      <div class="icon_new">
                          <?php
                          $today = date("Y-m-d");
                          $posted = get_the_date('Y-m-d',$postoid);
                          $day = day_diff($today, $posted);
                          ?>
                          <?php
                          if($day <30):
                          ?>
                          <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
                          <?php endif; ?>
                        </div>

                      <?php the_post_thumbnail('thumbnail'); ?>

                      <div class="inshopbox"><span><div class="inshop"><?php the_field('shop-name'); ?></div></span></div>

                  </div>
                </a>

                  <div class="category">
                    <table>
                      <tr>
                        <th>
                          <div class="shop_category fixHeightChild_01">
                            <?php
                              $tarms = get_the_terms( $post->ID,'shopcat' );
                              foreach ( $tarms as $tarm ) {
                                  $tarmslug = $tarm->slug;
                                  $tarmdesc = $tarm->description;
                              }
                            ?>

                            <a href="<?php bloginfo('url'); ?>/shop/<?php echo $tarmslug ;?>">&gt;
                            <?php echo $tarmdesc; ?>
                            </a>
                          </div>
                          <div class="address fixHeightChild_01">
                            <?php
                              $tarms = get_the_terms( $post->ID,'genepref');
                              foreach ( $tarms as $tarm ) {
                                  $tarmdesc = $tarm->name;
                              }
                            ?>
                            <?php echo $tarmdesc; ?>

                            <?php
                              $tarms = get_the_terms( $post->ID,'genearea');
                              foreach ( $tarms as $tarm ) {
                                  $tarmdesc = $tarm->name;
                              }
                            ?>
                            <?php echo $tarmdesc; ?>
                          </div>
                        </th>
                        <td>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <?php endwhile; endif; ?>
                <?php wp_reset_postdata(); ?>

              </div>

            </div>
            <!--ショップリストここまで-->


            <?php wp_reset_query(); ?>
            <!--メディアボクス-->
            <div id="media_box">
              <div id="mb_left">
                <!--twittwer-->
                <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/yutariya" data-widget-id="349801895629565952">@yutariyaさんのツイート</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                <!--twittwer-->
              </div>

              <div id="mb_right">
                <!--facebook-->
                <div class="fb-page"
                 data-href="https://www.facebook.com/yutari.jp/"
                 data-tabs="timeline"
                 data-width="480"
                 data-height="600"
                 data-small-header="true"
                 data-adapt-container-width="true"
                 data-hide-cover="false"
                 data-show-facepile="true">
                 <blockquote cite="https://www.facebook.com/yutari.jp/" class="fb-xfbml-parse-ignore">
                   <a href="https://www.facebook.com/yutari.jp/">ゆたり</a></blockquote>
                 </div>
                <!--facebook-->
              </div>
            </div>
            <!--メディアボックス-->
          <!--コンテンツここまで-->

          <div id="page_top">
            <a href="<?php bloginfo('url'); ?>/#wrapper"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
          </div>

        </section>
      </article>

    </div>
    <!--メインここまで-->

    <!--フッターここから-->
    <?php get_footer(); ?>
    <!--フッターここまで-->
  </div>
  <!--コンテナーここまで-->
</div>
<!--ラッパーここまで-->


<script>
jQuery(document).ready(function(){
  jQuery('.bxslider').bxSlider({
    auto: true,
    infiniteLoop: true,
    speed: 500,
    pager: false
  });
});
</script>

</body>
</html>
