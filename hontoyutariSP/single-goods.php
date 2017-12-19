<?php get_header('single');?>

<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-goods/image/common/goods_title_sp" width="282" height="30" alt="BOOK"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="book_common">
<div id="book" class="main">
<article>
<section>

<!--コンテンツここから-->
<div class="contents">
<!--アイテム紹介ここから-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php if(have_rows('goods-gallery')) : ?>
		<!--thumbnails-->
		<div id="thumbnail">
        <ul class="slides">
          <?php while(have_rows('goods-gallery')) : the_row(); ?>
            <?php
            $photo= get_sub_field('goods-gallery-item');
            ?>
          <li><img src="<?php echo $photo['sizes']['thumbnail']; ?>"></li>
            <?php endwhile; ?>
        </ul>
		</div>
        <!--thumbnails-->

<div id="item_exp">
    <?php else :?>
<div id="item_exp">
      <?php the_post_thumbnail('full'); ?>
    <?php endif; ?>
<div class="category">
<?php the_field('goods-sub'); ?>
</div>
<div class="ttl">
<?php the_field('goods-title'); ?>
</div>
</div>
<!--アイテム紹介ここまで-->

<!--アイテム詳細ここから-->

<div class="ttl">
<strong><?php the_field('goods-lead'); ?></strong>
</div>
<div id="item_detail">
<?php the_content(); ?>
</div>
<!--アイテム詳細ここまで-->

<!--アイテム情報ここから-->
<div id="item_info">
<div class="ttl">
<strong><?php the_field('goods-title'); ?></strong>
</div>
<div class="exp">
<?php the_field('goods-hosoku'); ?>
<div id="item_price">
<strong><?php the_field('goods-price'); ?></strong><br>
</div>
<?php the_field('goods-notice');?>
</div>
</div>
<!--アイテム情報ここまで-->
<?php endwhile; endif; ?>
<div id="cart">
<!--購入ボタン-->
<?php if(have_rows('goods-btn')):?>
<dl>
<?php while(have_rows('goods-btn')): the_row();?>
  <?php if( get_sub_field('goods-stock') ):?>
    <span class="btn_disable">品切れ中</span>
  <?php else :?>
    <dt><?php the_sub_field('goods-btn-code'); ?></dt>
  <?php endif; ?>
<?php endwhile;?>
</dl>
<div class="author">※当サイトのショッピングカートは<br>　<a target="_blank" href="https://hontoyutari.stores.jp/">STORES.jp</a>を利用しています。</div>
<?php endif; ?>
<!--購入ボタン-->
</div>

<?php wp_reset_query(); ?>

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
