<?php get_header('arc') ;?>



<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-shop/image/common/shoplist_title_sp" width="281" height="37" alt="SHOP-LIST"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="shop_common">
<div id="shop_index" class="main">
<article>
<section>

<!--コンテンツここから-->
<div class="contents">

<!--検索ボックスここから-->

<div id="p_down">
<div class="control_search">
<form name="control" method="get" action="<?php bloginfo('url'); ?>/">
<ul class="child">
<li class="search_keyword">
<input type="text" name="s" id="s" class="search_keyword" placeholder="店名から検索" value="">
</li>

<li class="search_category">
<select class="fmselect" name="catnum">
  <option value="">ジャンル</option>
  <?php
  $categories = get_categories(array('taxonomy' => 'shopcat'));
  foreach($categories as $category) :
  ?>
<option value="<?php echo $category->term_id; ?>"><?php echo $category->cat_name; ?></option>
  <?php endforeach; ?>
</select>
</li>


<li class="search_prefecture">
<select name="prefnum" class="fmselect" >
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
</li>


<li class="search_area">
<select class="fmselect" name="areanum" >
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
</li>

<dl class="s_btn">
<dt id="os_btn">

<span class="rarrow">
  <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/img-arrow_blown_right_w26.png">
</span><input class="btn" type="submit" name="search_btn" value="お店を探す">
</dt>
</dl>
</ul>

</form>
</div>
<dl class="trigger">
    <dt><span class="ac_btn">&#8744;</span>
        <div id="acc">お店を探す</div>
    </dt>
</dl>
</div>

<script>
jQuery('ul.child').hide();
jQuery(document).on('touchstart','.trigger',function(){
jQuery('#acc').toggle();
jQuery('ul.child').slideToggle();
jQuery('span.ac_btn').toggleClass('close');
if (jQuery('span.ac_btn').hasClass('close')) {
	jQuery('span.ac_btn').text('\u2227');
} else {
	jQuery('span.ac_btn').text('\u2228');
}

});
</script>

<!--検索ボックスここまで-->


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
<div class="column_2 fixHeight">
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
<div class="inner">
<a href="<?php the_permalink(); ?>">
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
    <div class="icon_new"><p>NEW</p><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="14" height="31" alt="NEW"></div>
    <?php endif; ?>
<?php the_post_thumbnail('thumbnail'); ?>
</a>
</div>

<div class="shop_name fixHeightChild_02">
<a href="<?php the_permalink(); ?>">
<?php the_field('shop-name'); ?>
</a>
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

<!--ページャーここから-->
<div class="pager">
<?php nom_posts_pagination(); ?>
</div>
<!--ページャーここまで-->


</div>
<!--コンテンツここまで-->

<div id="page_top">
<a href="#wrapper"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="29" height="29" alt="PAGE TOP"></a>
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
<!--ラッパーここまで-->
</body>
</html>
