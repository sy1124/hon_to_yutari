<?php get_header('arc');?>

<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-info/image/common/ttl-page_header.png" width="282" height="22" alt="PRIVACY POLICY"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="info_common">
<div id="info" class="main">
<article>
<section>

<!--コンテンツここから-->
<div class="contents">
<div class="ttl"></div>
<div class="ttl2"><?php echo  get_the_date('Y年n月'); ?>の記事</div>

<!--投稿ここから-->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="topicBox">
    <div id="timeBox">
    <p><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time></p>
    </div>
      <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
      </a>
    <div id="entryBox">
    <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; endif; ?>
<!--投稿ここまで-->
<!--ページャーここから-->
<div class="pager_box">
<?php nom_posts_pagination(); ?>
</div>
<!--ページャーここまで-->

<!--リストここから-->
<div class="list_block">
  <h4>以前の記事：</h4>
  <select class="fmselect" onChange='document.location.href=this.options[this.selectedIndex].value;' style="width:200px">
  <option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
    <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
  </select>
</div>
<!--リストここまで-->

</div>
<!--コンテンツここまで-->
<?php wp_reset_query(); ?>
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
