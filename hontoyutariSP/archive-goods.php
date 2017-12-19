<?php get_header('arc');?>


<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-goods/image/common/goods_title_sp" width="282" height="30" alt="GOODS"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="goods_common">
<div id="goods_index" class="main">
<article>
<section>

<!--コンテンツここから-->
<div class="contents">

<!--検索結果ここから-->

<div class="search_result">
<div class="column_2 fixHeight">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="box">
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
      <p>NEW</p><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="14" height="31" alt="NEW">
    </div>
      <?php endif; ?>
<a href="<?php the_permalink(); ?>">
  <?php the_post_thumbnail('thumbnail'); ?>
</a>
</div>
<div class="ttl fixHeightChild_03">
<a href="<?php the_permalink(); ?>"><?php the_field('goods-title'); ?></a>
</div>
<div class="price fixHeightChild_04">
 <?php the_field('goods-price'); ?>
</div>
<div class="detail">
</div>
</div>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>

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
