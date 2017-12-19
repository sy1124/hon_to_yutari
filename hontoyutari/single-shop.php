<?php get_header('single');?>

<body onload="initialize();">
<?php include_once("/usr/home/aa210uz1th/html/google/analyticstracking.php") ?>

<!--ラッパーここから-->
<div id="wrapper">

<!--サイドバーここから-->
<?php get_sidebar(); ?>
<!--サイドバーここまで-->

<!--コンテナーここから-->
<div id="container">

  <!--ヘッダー帯画像-->
  <div id="page_ttl">
    <img src="<?php bloginfo('template_directory'); ?>/data-shop/image/shoplist_title.png" width="1300" height="195" alt="SHOP">
  </div>
  <!--ヘッダー帯画像-->

  <!--メインここから-->
  <div id="shop_common">
    <div id="shop" class="main">

      <article>
        <section>


          <!--コンテンツ（カラム版）ここから-->
          <div class="content_outline">
            <div class="contents_column">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <!--左ブロックここから-->
              <div class="left_block">
                <div class="left_block_inner">
                  <h1><?php the_field('shop-name'); ?></h1>
                    <div class="shop_exp">
                      <!--カテゴリ-->
                      <?php
                        $tarmsSC = get_the_terms( $post->ID,'shopcat');
                        foreach ( $tarmsSC as $tarmSC ) {
                            $tarmdSC = $tarmSC->name;
                        }
                      ?>
                      <!--カテゴリ-->
                      <!--県-->
                      <?php
                        $tarmsGP = get_the_terms( $post->ID,'genepref');
                        foreach ( $tarmsGP as $tarmGP ) {
                            $tarmdGP = $tarmGP->name;
                        }
                      ?>
                      <!--県-->
                      <!--市町村-->
                      <?php
                        $tarmsGA = get_the_terms( $post->ID,'genearea');
                        foreach ( $tarmsGA as $tarmGA ) {
                            $tarmdGA = $tarmGA->name;
                        }
                      ?>
                      <!--市町村-->
                      <?php echo $tarmdSC; ?>｜<?php echo $tarmdGP; ?><?php echo $tarmdGA; ?>

                    </div>
                  <h2><?php the_field('shop-lead'); ?></h2>

                  <?php the_content(); ?>

                  <?php $location = get_field('shop-location');if( !empty($location) ):?>
                  <!--//↓googlemap//-->
                  <div class="google_map">
                  <div id="map_canvas" style="width:560px;height:300px"></div>
                  </div>
                  <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=true"></script>
                  <script type="text/javascript">

                  var myLatlng = new google.maps.LatLng(<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>);
                  var name = "<?php the_title(); ?>";
                  var adres = "<?php echo $location['address']; ?>";
                  var hpurl = "";
                  var zm = 13;
                  </script>
                  <script src="http://hontoyutari.com/google/custommap.js"></script>
                  <script>
                  </script>
                  <link href="http://hontoyutari.com/google/custommap.css" rel="stylesheet" type="text/css" media="all" />
                  <!--//↑googlemap//-->
                <?php endif; ?>

				<?php if(get_field('shop-topic')) : ?>
                  <div class="read_article">
                    <a class="btn" href="<?php the_field('shop-topic'); ?>" target="_blank">ゆたりの記事を読む</a>
                  </div>
				<?php endif; ?>

                  </div>
                </div>
              <!--左ブロックここまで-->

              <!--右ブロックここから-->
              <div class="right_block">
                <!--このショップについてここから-->
                <div id="about_shop">
                  <div class="sam">
                    <?php the_post_thumbnail('medium'); ?>
                  </div>
                  <h3><?php the_field('shop-name'); ?></h3>
                  <div class="exp">
                    <?php the_field('shop-hosoku'); ?>
                  </div>
                </div>
                <!--このショップについてここまで-->

                <!--検索ボックスここから-->
                <div class="control_search_outline">

                <div class="control_search_logo">
                  <img src="<?php bloginfo('template_directory'); ?>/data-shop/image/logo-shop_list.png" width="86" height="65" alt="PROJECT">
                </div>

                <div class="control_search">
                <form name="control" method="get" action="<?php bloginfo('url'); ?>/">
                <div class="search_category">
                <select class="fmselect" name="catnum">
                <option value="">ジャンル</option>

                <?php
                $categories = get_categories(array('taxonomy' => 'shopcat'));
                foreach($categories as $category) :
                ?>
                  <option value="<?php echo $category->term_id; ?>">
                    <?php echo $category->cat_name; ?>
                  </option>
                <?php endforeach; ?>
                </select>
                </div>

                <div class="search_prefecture">
                <select class="fmselect" name="prefnum">
                <option value="">都道府県</option>
                <?php
                $taxonomys = get_terms('genepref');
                if(!is_wp_error($taxonomys) && count($taxonomys)):
                foreach($taxonomys as $taxonomy):
                $tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => 'genepref', 'term' => $taxonomy->slug ) );
                if($tax_posts):
                ?>

                <option value="<?php echo $taxonomy->term_id; ?>">
                  <?php echo $taxonomy->name; ?>
                </option>
                <?php endif; endforeach; endif; ?>

                </select>
                </div>

                <div class="search_area">
                <select class="fmselect" name="areanum">
                <option value="">地域</option>
                <?php
                $taxonomys = get_terms('genearea');
                if(!is_wp_error($taxonomys) && count($taxonomys)):
                foreach($taxonomys as $taxonomy):
                $tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => 'genearea', 'term' => $taxonomy->slug ) );
                if($tax_posts):
                ?>
                <option value="<?php echo $taxonomy->term_id; ?>">
                  <?php echo $taxonomy->name; ?>
                </option>
                <?php endif; endforeach; endif; ?>
                </select>
                </div>
                <div class="search_arrow">
                  <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/img-arrow_blown_lower_w28.png" width="28" height="26" alt=""></div>
                <input type="hidden" name="s" id="s">
                <input class="btn" type="submit" value="お店を探す">
                </form>
                </div>
                </div>
                <!--検索ボックスここまで-->

                <!--販売・見本書籍ここから-->
                <div id="shoseki">
                  <!--“販売書籍”は、IDが未入力の場合、見出しごと非表示-->
                  <?php if(get_field('shop-sell')) :?>
                      <?php $sell = get_field('shop-sell'); $sells = explode(',', $sell);?>
                      <h3>販売書籍</h3>
                      <ul class="hanbai">
                        <?php foreach($sells as $bsells):?>
                        <li><a href="<?php echo post_permalink($bsells); ?>"><?php echo get_the_title($bsells) ;?></a></li>
                        <?php endforeach;?>
                      </ul>
                  <? endif ;?>
                  <!--“見本書籍”は、IDが未入力の場合、見出しごと非表示-->
                  <?php if(get_field('shop-mihon')) :?>
                    <?php $mihon = get_field('shop-mihon'); $smihon = explode(',', $mihon);?>
                    <h3>見本書籍</h3>
                    <ul class="mihon">
                      <?php foreach($smihon as $bmihon):?>
                      <li><a href="<?php echo post_permalink($bmihon);?>"><?php echo get_the_title($bmihon) ;?></a></li>
                      <?php endforeach;?>
                    </ul>
                  <? endif ;?>

                  <!--・“販売書籍”、“見本書籍”どちらも入力が無い場合は、赤字も非表示に-->
                  <?php
                  $hs = get_field('shop-sell');
                  $ms = get_field('shop-mihon');
                  ;?>
                  <?php if ($hs or $ms) :?>
                    <p><span>
                      ※お買い求めの際は、お店に在庫状況を確認してください。
                      見本商品は販売商品ではございません。
                    </span></p>
                  <?php endif;?>
                </div>
                <!--販売・見本書籍ここまで-->
                </div>
              <!--右ブロックここまで-->
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
              </div>
            </div>
          <!--コンテンツ（カラム版）ここまで-->

          <!--ページャーここから-->
          <div class="pager">
            <table>
              <tr>
                <th>
                  <?php if (get_next_post()): ?>
<?php
next_post_link('%link','<img src="'.get_bloginfo('template_directory').'/data-common/image/contents/btn-prev.png" width="57" height="57" alt="次へ">');
?>
                  <?php endif; ?>
                </th>
                    <td><a href="<?php bloginfo('url'); ?>/shop">
                      <img src="<?php bloginfo('template_directory'); ?>/data-shop/image/btn-shop_ichiran.png" alt="ショップ一覧を見る" width="147" height="36"></a>
                    </td>
                  <th>
          <?php if (get_previous_post()): ?>
  <?php
  previous_post_link('%link','<img src="'.get_bloginfo('template_directory').'/data-common/image/contents/btn-next.png" width="57" height="57" alt="前へ">');
  ?>
          <?php endif; ?>
                  </th>
                </tr>
              </table>
            </div>
          <!--ページャーここまで-->

          <!--コンテンツここから-->
          <div class="contents">
            <div class="main_ttl">
              <img src="<?php bloginfo('template_directory'); ?>/data-shop/image/ttl-book_goods.png" width="206" height="84" alt="BOOKandGOODS">
            </div>
              <!--レコメンドここから-->
              <div id="recommend" class="fixHeight">
                <div class="left_contents">
                  <?php if (get_field('shop-reco-left-ID')): ?>
                    <?php $recomL = get_field('shop-reco-left-ID'); ?>
                    <?php $postT = get_post_type( $recomL );?>
                  <table>
                    <tr>
                      <th>
                        <a href="<?php echo post_permalink($recomL); ?>">
                        <?php echo get_the_post_thumbnail($recomL, array(200,200)); ?>
                        </a>
                      </th>
                      <td>
                        <div class="category fixHeightChild_01">
                          <?php echo get_field($postT.'-sub', $recomL); ?>
                        </div>
                        <div class="ttl fixHeightChild_02">
                          <a href="<?php echo post_permalink($recomL); ?>">
                            <?php echo get_field($postT.'-title', $recomL); ?></a>
                        </div>
                        <div class="price fixHeightChild_03">
                          <?php echo get_field($postT.'-price', $recomL); ?><br>
                        </div>
                        <div class="btn_fixHeightChild_04">
                          <?php
                         $rowsL = get_field($postT.'-btn', $recomL); // get all the rows
                         $first_rowL = $rowsL[0]; // get the first row
                         $first_row_codeL = $first_rowL[$postT.'-btn-code']; // get the sub field value
                         $stockL = $first_rowL[$postT.'-stock'];
                         ?>
                         <?php if($stockL):?>
                           <span class="btn_disable">品切れ中</span>
                         <?php else :?>
                         <?php echo $first_row_codeL;?>
                         <?php endif; ?>
                       </div>
                        </td>
                      </tr>
                    </table>
                      <?php endif; ?>
                  </div>

                <div class="right_contents">
                  <?php if (get_field('shop-reco-right-ID')): ?>
                    <?php $recomR = get_field('shop-reco-right-ID'); ?>
                    <?php $postTR = get_post_type( $recomR );?>
                  <table>
                    <tr>
                      <th>
                        <a href="<?php echo get_permalink($recomR)?>">
                        <?php echo get_the_post_thumbnail($recomR, array(200,200)); ?>
                        </a>
                      </th>
                      <td>
                        <div class="category fixHeightChild_01">
                          <?php echo get_field($postTR.'-sub', $recomR); ?>
                        </div>
                        <div class="ttl fixHeightChild_02">
                          <a href="<?php echo get_permalink($recomR)?>">
                            <?php echo get_field($postTR.'-title', $recomR); ?>
                          </a>
                        </div>
                        <div class="price fixHeightChild_03">
                          <?php echo get_field($postTR.'-price', $recomR); ?>
                        </div>
                        <div class="btn_fixHeightChild_04">
                          <?php
                          $rowsR = get_field($postTR.'-btn', $recomR); // get all the rows
                          $first_rowR = $rowsR[0]; // get the first row
                          $first_row_codeR = $first_rowR[$postTR.'-btn-code']; // get the sub field value
                          $stockR = $first_rowR[$postTR.'-stock'];
                          ?>
                        <?php if($stockR):?>
                          <span class="btn_disable">品切れ中</span>
                        <?php else :?>
                        <?php echo $first_row_codeR;?>
                        <?php endif; ?>
                        </div>
                        </td>
                      </tr>
                    </table>
                    <?php endif; ?>
                  </div>

                </div>
              <!--レコメンドここまで-->
            </div>
          <!--コンテンツここまで-->

          <div id="page_top">
            <a href="#wrapper"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
          </div>
          </section>
        </article>
      </div>
  </div>
  <!--メインここまで-->
  <!--フッターここから-->
  <?php get_footer();?>
  <!--フッターここまで-->
</div>
<!--コンテナーここまで-->
</div>
<!--ラッパーここまで-->

</body>
</html>
