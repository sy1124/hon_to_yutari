<?php get_header('single');?>

<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-shop/image/common/shoplist_title_sp" width="281" height="37" alt="SHOP-LIST"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="shop_common">
<div id="shop" class="main">
<article>
<section>

<!--コンテンツここから-->
<div class="contents">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="shop_entry">
<?php the_post_thumbnail('full'); ?>

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

</div>

<!--記事下詳細ボタンここから-->
<div id="detail_btn">

<?php $location = get_field('shop-location'); if( !empty($location) ):?>
<a class="btn" target=”_blank” href="https://www.google.co.jp/maps?ll=<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>&z=13&q=loc:<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">地図を見る</a>
<?php endif; ?>

<?php if(get_field('shop-topic')) : ?><a class="btn" target="_blank" href="<?php the_field('shop-topic'); ?>">ゆたりの記事を読む</a><?php endif; ?>

<div class="kanren_link">
<strong><a href="<?php bloginfo('url'); ?>/shop/">ショップ一覧を見る</a>
</strong>
<div class="under_line"></div>
</div>
</div>
<!--記事下詳細ボタンここまで-->

<!--アイテム情報ここから-->
<div id="item_info">
<div class="ttl">
<strong><?php the_field('shop-name'); ?></strong>
</div>
<div class="exp">
<?php the_field('shop-hosoku'); ?></div>
</div>
<!--アイテム情報ここまで-->

<!--販売・見本書籍ここから-->
<div id="shoseki">
  <!--“販売書籍”は、IDが未入力の場合、見出しごと非表示-->
  <?php if(get_field('shop-sell')) :?>
      <?php $sell = get_field('shop-sell'); $sells = explode(',', $sell);?>
      <div class="title">販売書籍</div>
      <ul class="hanbai">
        <?php foreach($sells as $bsells):?>
        <li><a href="<?php echo post_permalink($bsells); ?>"><?php echo get_the_title($bsells) ;?></a></li>
        <?php endforeach;?>
      </ul>
  <? endif ;?>
  <!--“見本書籍”は、IDが未入力の場合、見出しごと非表示-->
  <?php if(get_field('shop-mihon')) :?>
    <?php $mihon = get_field('shop-mihon'); $smihon = explode(',', $mihon);?>
    <div class="title">見本書籍</div>
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

<!--レコメンドここから-->
<div id="recommend">
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
    <div class="category">
      <?php echo get_field($postT.'-sub', $recomL); ?>
    </div>
    <div class="ttl">
      <a href="<?php echo post_permalink($recomL); ?>"><?php echo get_field($postT.'-title', $recomL); ?></a>
    </div>
    <div class="price">
      <?php echo get_field($postT.'-price', $recomL); ?>
    </div>
    </td>
  </tr>
  <tr>
    <td class="btn" colspan="2">
      <div class="buy_btn">
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
          <a href="<?php echo post_permalink($recomR)?>">
          <?php echo get_the_post_thumbnail($recomR, array(200,200)); ?>
          </a>
        </th>
      <td>
        <div class="category">
          <?php echo get_field($postTR.'-sub', $recomR); ?>
        </div>
        <div class="ttl">
          <a href="<?php echo post_permalink($recomR)?>"><?php echo get_field($postTR.'-title', $recomR); ?></a>
        </div>
        <div class="price">
          <?php echo get_field($postTR.'-price', $recomR); ?>
        </div>
      </td>
  </tr>
  <tr>
    <td class="btn" colspan="2">
      <div class="buy_btn">
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
<?php endwhile; endif; ?>
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
