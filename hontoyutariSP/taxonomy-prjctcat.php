<?php get_header('arc');?>

<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-project/image/common/project_title_sp" width="281" height="37" alt="PROJECT"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="project_common">
<div id="project" class="main">
<article>
<section>
  <!-- 表示中のページのタームオブジェクトを取得 -->
  <?php $catinfo = get_term_by('slug', $term, $taxonomy);?>
  <!-- スラッグからページ情報を取得 -->
  <?php $pageinfo = get_page_by_path('prjctinfo/'.$catinfo->slug);?>

<!--コンテンツここから-->
<div class="contents">

<div id="project_ttl">
<table>
<tr>
<th>
  <img src="<?php bloginfo('template_directory'); ?>/data-project/image/index/<?php echo $catinfo->slug;?>.png" width="80px" height="" alt="01">
</th>
<td><h1><?php the_field('prjct-name' ,$pageinfo->ID);?></h1></td>
</tr>
</table>
</div>

<!--このプロジェクトについてここから-->
<div id="about_project">
<h2><?php the_field('prjct-lead' ,$pageinfo->ID);?></h2>
<p><?php echo $pageinfo->post_content; ?></p>
</div>
<!--このプロジェクトについてここまで-->

<div class="main_ttl">
<img src="<?php bloginfo('template_directory'); ?>/data-project/image/common/ttl-contents.png" width="94" height="37" alt="CONTENTS">
</div>

<!--プロジェクトコンテンツここから-->
<div id="project_contents">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<table>
<tr>
<th>
<div class="sam">
   <a href="<?php the_permalink(); ?>">
     <?php the_post_thumbnail(array( 240, 134 )); ?>
   </a>
</div>
</th>
<td>
<ul class="num">
  <!--<li>
    <img src="<?php bloginfo('template_directory'); ?>/data-project/image/index/<?php echo $catinfo->slug;?>_s.png" alt="" width="" height="">
  </li>-->
  <li><?php echo $catinfo->name;?></li>
</ul>
<h3><?php the_field('project_header'); ?></h3>
<div class="address">
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
<div class="detail">
<a class="btn" href="<?php the_permalink(); ?>">詳しく見る</a>
</div>
</td>
</tr>
</table>


<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
</div>
<!--プロジェクトコンテンツここまで-->

<div class="kanren_link">
<strong><a href="<?php bloginfo('url'); ?>/project/">他のプロジェクトを見る</a>
</strong>
<div class="under_line"></div>
</div>

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
