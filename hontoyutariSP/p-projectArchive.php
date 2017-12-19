<?php
/*
Template Name: PROJECT-ARCHIVE
*/
?>
<?php get_header('kotei');?>


<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-project/image/common/project_title_sp" width="281" height="37" alt="PROJECT"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="project_common">
<div id="project_index" class="main">
<article>
<section>
  <!--カスタム分類のスラッグを取得-->
  <?php $terms = get_the_terms( $post->ID, 'prjctcat' ); ?>
  <?php foreach ( $terms as $term ) { $termslug = $term ->slug; } ?>
  <!-- スラッグからページ情報を取得 -->
  <?php $pageinfo = get_page_by_path('prjctinfo/'.$termslug); ?>

<!--コンテンツここから-->
<div class="contents">

  <?php $the_query = new WP_Query( array('posts_per_page' => -1, 'post_type' => 'page', 'orderby' =>'date', 'post_parent' => 504)); ?>
  <?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  <?php $pageslug = $post->post_name; ?>

<div class="box">
<div class="inner">
<!--<div class="icon_new"><p>NEW</p><img src="../common/image/contents/icon-new.png" width="14" height="31" alt="NEW"></div>-->
  <a href="<?php bloginfo(url);?>/project/<?php echo $pageslug;?>">
    <img src="<?php the_field('prjct-img');?>"  alt="">
  </a>
</div>
<div class="more">
<div class="exp">
<?php the_field('prjct-disc');?>
</div>
<div class="detail">
<a class="btn" href="<?php bloginfo(url);?>/project/<?php echo $pageslug;?>">記事を見る</a>
</div>
</div>
</div>
<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>


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
