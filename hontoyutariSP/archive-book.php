<?php get_header('arc');?>

<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-book/image/common/book_title_sp" width="281" height="33" alt="BOOK"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="book_common">
<div id="book_index" class="main">
<article>
<section>

<!--コンテンツここから-->
<div class="contents">

<!--検索ボックスここから-->
<!--<div class="control_search">
<form name="control" method="get" action="#">

<input type="text" name="search_keyword" class="search_keyword" placeholder="フリーワード" value="">

<select class="fmselect" name="search_category">
<option value="">ジャンル</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
</select>

<select class="fmselect" name="search_project">
<option value="">プロジェクト</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
<option value="●●●●●●">●●●●●</option>
</select>

<table>
<tr>
<td>&nbsp;</td>
<th><input class="btn" type="submit" name="search_btn" value="お店を探す"></th>
</tr>
</table>

</form>
</div>
検索ボックスここまで-->

<!--検索結果ここから-->
<div class="search_result_ttl">
<!--ジャンル／茨城県／水戸周辺　の検索結果：-->
</div>

<div class="search_result_sort">
<!--<a href="#" class="active">新しい順</a>｜<a href="#">古い順</a>-->
</div>

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
      <div class="icon_new"><p>NEW</p><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="14" height="31" alt="NEW"></div>
        <?php endif; ?>
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
</div>
<div class="category fixHeightChild_02">
<?php the_field('book-sub'); ?>
</div>
<div class="ttl fixHeightChild_03">
<a href="<?php the_permalink(); ?>"><?php the_field('book-title'); ?></a>
</div>
<div class="price fixHeightChild_04">
<?php the_field('book-price'); ?>
</div>
<!--<div class="detail">
<a class="btn" href="<?php the_permalink(); ?>">記事を見る</a>
<?php if (get_field('book-store')): ?>
  <?php $buy = get_field('book-store'); ?>
  <a class="btn btn_cart" target="_blank" href="<?php the_field('book-store'); ?>">購入する</a>
<?php else :?>
  <span class="btn_disable">購入する</span>
<?php endif; ?>
</div>-->
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
