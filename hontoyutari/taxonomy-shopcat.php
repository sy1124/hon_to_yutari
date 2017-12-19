<?php get_header('arc');?>

<body>
<?php include_once("/usr/home/aa210uz1th/html/google/analyticstracking.php") ?>

<!--ラッパーここから-->
<div id="wrapper">


<!--サイドバーここから-->
<?php get_sidebar(); ?>
<!--サイドバーここまで-->

<!--コンテナーここから-->
<div id="container">

  <!--ヘッダー帯画像ここから-->
  <div id="page_ttl">
    <img src="<?php bloginfo('template_directory'); ?>/data-shop/image/shoplist_title.png" width="1300" height="195" alt="SHOP">
  </div>
  <!--ヘッダー帯画像ここまで-->

  <!--メインここから-->
  <div id="shop_common">
    <div id="shop_index" class="main">
      <article>
        <section>
          <!--コンテンツここから-->
          <div class="content_outline">
            <div class="contents">
              <!--検索ボックスここから-->
<div class="control_search">
<form name="control" method="get" action="<?php bloginfo('url'); ?>/">
<table>
<tr>
  <td class="search_keyword">
  <input type="text" name="s" id="s" class="search_keyword" placeholder="店名から検索" value="">
  </td>

    <th>&nbsp;</th>

  <td class="search_category">
  <select class="fmselect" name="catnum" style="width:230px">
  <option value="">ジャンル</option>
    <?php
    $categories = get_categories(array('taxonomy' => 'shopcat'));
    foreach($categories as $category) :
    ?>
  <option value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
  <?php endforeach; ?>
  </select>
  </td>

  <th>&nbsp;</th>

  <td class="search_prefecture">
  <select class="fmselect" name="prefnum" style="width:170px">
  <option value="">都道府県</option>
    <?php
    $taxonomys = get_terms('genepref');
    if(!is_wp_error($taxonomys) && count($taxonomys)):
    foreach($taxonomys as $taxonomy):
    $tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => 'genepref', 'term' => $taxonomy->slug ) );
    if($tax_posts):
    ?>
  <option value="<?php echo $taxonomy->term_id; ?>"><?php echo $taxonomy->name; ?></option>
  <?php endif; endforeach; endif; ?>
  </select>
  </td>

  <th>&nbsp;</th>

  <td class="search_area">
  <select class="fmselect" name="areanum" style="width:170px">
  <option value="">地域</option>
    <?php
    $taxonomys = get_terms('genearea');
    if(!is_wp_error($taxonomys) && count($taxonomys)):
    foreach($taxonomys as $taxonomy):
    $tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => 'genearea', 'term' => $taxonomy->slug ) );
    if($tax_posts):
    ?>

    <option value="<?php echo $taxonomy->term_id; ?>"><?php echo $taxonomy->name; ?></option>
    <?php endif; endforeach; endif; ?>
  </select>
    </td>
  <td class="search_arrow"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/img-arrow_blown_right_w26.png" width="26" height="28" alt=""></td>
  <td><input class="btn" type="submit" value="お店を探す">
  </td>
</tr>
</table>
</form>
</div>
<!--検索ボックスここまで-->

<!--パンくず-->
<div class="search_result_ttl">
<?php single_tag_title(); ?>のお店一覧
</div>
<!--パンくず-->

<!--時系列ソート-->
<div class="search_result_sort">
<?php $order = $_GET['order']; ?>
<a href="<?php echo esc_url(add_query_arg(array('order'=>'DESC'))); ?>"
  <?php if($order == 'DESC' or empty($order)) echo 'class="active"';?>>新しい順</a>
｜
<a href="<?php echo esc_url(add_query_arg(array('order'=>'ASC'))); ?>"
    <?php if($order == 'ASC') echo 'class="active"';?>>古い順</a>
</div>
<!--時系列ソート-->
              <div class="search_result">

                <div class="column_3 fixHeight">
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="box">

                      <div class="shop_category fixHeightChild_01">
                        <?php
                          $tarms = get_the_terms( $post->ID,'shopcat' );
                          foreach ( $tarms as $tarm ) {
                              $tarmslug = $tarm->slug;
                              $tarmdesc = $tarm->description;
                          }
                        ?>
                        <a href="<?php bloginfo('url'); ?>/shop/<?php echo $tarmslug; ?>/">&gt;
                        <?php echo $tarmdesc; ?>
                        </a>
                      </div>
                      <a href="<?php the_permalink(); ?>">
                      <div class="inner">

                        <?php
                        //本日の日付を取得
                        $today = date("Y-m-d");
                        //表示中の記事の投稿日取得
                        $posted = get_the_date('Y-m-d');
                        // 日付を関数に渡す
                        $day = day_diff($today, $posted);
                        ?>

                        <?php
                        //3日以内の場合
                        if($day <30):
                        ?>

                        <div class="icon_new">
                          <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
                        </div>
                        <?php endif; ?>

                        <?php the_post_thumbnail('thumbnail'); ?>
                      </div>
                      </a>
                      <div class="shop_name fixHeightChild_02">
                        <?php the_field('shop-name'); ?>
                      </div>
                      <div class="shop_address fixHeightChild_03">
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
                    </div>
                  <?php endwhile; endif; ?>
                  </div>
                </div>
                <!--検索結果ここまで-->
              </div>
            </div>
          <!--コンテンツここまで-->

          <div id="page_top">
            <div class="pager_box">
            <?php nom_posts_pagination(); ?>
            </div>
            <?php wp_reset_query(); ?>
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
