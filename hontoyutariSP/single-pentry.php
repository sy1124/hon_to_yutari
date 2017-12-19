<?php get_header('single');?>

<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-project/image/common/project_title_sp" width="281" height="37" alt="PROJECT"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="project_common">
<div id="project_detail" class="main">
<article>
<section>
	<!--カスタム分類のスラッグを取得-->
	<?php $terms = get_the_terms( $post->ID, 'prjctcat' ); ?>
	<?php foreach ( $terms as $term ) { $termslug = $term ->slug; } ?>

<!--コンテンツここから-->
<div class="contents">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!--アイテム詳細ここから-->
<div id="item_detail">

<div class="ttl">
<!--<img src="<?php bloginfo('template_directory'); ?>/data-project/image/index/<?php echo $termslug;?>_s.png" width="" height="" alt=""/>-->
<h1><?php the_field('project_header'); ?></h1>
</div>

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

<h2><?php the_field('project_lead'); ?></h2>
<?php the_content(); ?>


<!--ゆたりの記事へのリンクボタン-->
<div class="read_article">
	<?php $colmn = get_field('p_con_left'); ?>
		<?php if ( empty($colmn)): ?><!--'p_con_left'に情報がなければこの場所にボタンを表示-->
			<?php $yTopic = get_field('p_yutari_topics'); ?>
				<?php if ($yTopic): ?><!--ゆたりの記事へのリンクがある場合は表示する-->
				<a class="btn" href="<?php echo $yTopic ;?>" target="_blank">ゆたりの記事を読む</a>
				<?php endif; ?>
		<?php else :?>
		<?php endif; ?>
</div>
<!--ゆたりの記事へのリンクボタン-->

	<div class="break_img">
		<img src="<?php the_field('p_obi_pic');?>" alt="">
	</div>

<!--コンテンツ（カラム版）ここから-->
<div class="contents_column">
<?php the_field('p_con_left'); ?>
</div>
<!--コンテンツ（カラム版）ここまで-->

<!--ゆたりの記事へのリンクボタン-->
<div class="read_article2">
<?php $colmn = get_field('p_con_left'); ?>
	<?php if ($colmn): ?><!--'p_con_left'に情報があればこの場所にボタンを表示-->
		<?php $yTopic = get_field('p_yutari_topics'); ?>
			<?php if ($yTopic): ?><!--ゆたりの記事へのリンクがある場合は表示する-->
			<a class="btn" href="<?php echo $yTopic ;?>" target="_blank">ゆたりの記事を読む</a>
			<?php endif; ?>
	<?php else :?>
	<?php endif; ?>
</div>
<!--ゆたりの記事へのリンクボタン-->

</div>
<!--アイテム詳細ここまで-->

					<script type="text/javascript">
                          jQuery(document).on('click','dt span',function(){
                          	jQuery(this).parent('dt').next('dd').slideToggle();
                          	jQuery(this).toggleClass('close');
                          	if (jQuery(this).hasClass('close')) {
                          		jQuery(this).text('\u2227');
                          	} else {
                          		jQuery(this).text('\u2228');
                          	}
                          	return false;
                          });
                    </script>
              <!--カテゴリーメニューここから-->
                <div id="category_menu" class="accordion-box">
                  <span class="menu_logo">
                    <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/logo-project.png" width="" height="" alt="PROJECT"/>
                    </span>

                  <span class="menu_outline">
										<?php $the_query = new WP_Query( array('posts_per_page' => -1, 'post_type' => 'page', 'post_parent' => 504, 'order' => 'ASC', 'orderby' => 'title')); ?>
										<?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
										<?php $pageslug = $post->post_name; ?>

										<dl>
											<dt><a href="<?php bloginfo('url'); ?>/project/<?php echo $pageslug; ?>/"><?php the_title(); ?></a> <span>&#8744;</span></dt>
											<dd>
												<ul>
												<?php
												$args = array('numberposts'=>3, 'post_type'=>'pentry', 'prjctcat'=>$pageslug);
												$postslist = get_posts( $args );
												foreach ($postslist as $post) : setup_postdata($post); ?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

												<?php endforeach; wp_reset_postdata(); ?>
												</ul>
											</dd>
										</dl>
									<?php endwhile; endif; ?>
									<?php wp_reset_postdata(); ?>


                  </div>
            <!--カテゴリーメニューここまで-->


<!--レコメンドここから-->
<div id="recommend">
<div class="left_contents">
	<?php if (get_field('pro-reco-left-ID')): ?>
	<?php $recomL = get_field('pro-reco-left-ID'); ?>
	<?php $postT = get_post_type( $recomL );?>
<table>
	<tr>
	<th>
					<?php
					//本日の日付を取得
					$today = date("Y-m-d");
					//表示中の記事の投稿日取得
					$posted = get_the_date('Y-m-d',$recomL);
					// 日付を関数に渡す
					$day = day_diff($today, $posted);
					?>
					<?php
					//3日以内の場合
					if($day <4):
					?>
					<div class="icon_new">
					<img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
					</div>
				<?php endif; ?>

		<a href="<?php echo post_permalink($recomL); ?>">
			<?php echo get_the_post_thumbnail($recomL, array(200,200)); ?>
		</a>
	</th>
	<td>
		<div class="category">
			<?php echo get_field($postT.'-sub', $recomL); ?>
		</div>
		<div class="ttl">
			<a href="<?php echo post_permalink($recomL); ?>">
				<?php echo get_field($postT.'-title', $recomL); ?>
			</a>
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
	<?php if (get_field('pro-reco-right-ID')): ?>
	<?php $recomR = get_field('pro-reco-right-ID'); ?>
	<?php $postTR = get_post_type( $recomR );?>
<table>
	<tr>
		<th>
						<?php
						//本日の日付を取得
						$today = date("Y-m-d");
						//表示中の記事の投稿日取得
						$posted = get_the_date('Y-m-d',$recomR);
						// 日付を関数に渡す
						$day = day_diff($today, $posted);
						?>
						<?php
						//3日以内の場合
						if($day <4):
						?>
						<div class="icon_new">
						<img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
						</div>
					<?php endif; ?>

			<a href="<?php echo post_permalink($recomR); ?>">
				<?php echo get_the_post_thumbnail($recomR, array(200,200)); ?>
			</a>
		</th>
	<td>
		<div class="category"><?php echo get_field($postTR.'-sub', $recomR); ?></div>
		<div class="ttl"><a href="<?php echo post_permalink($recomR); ?>">
			<?php echo get_field($postTR.'-title', $recomR); ?></a>
		</div>
		<div class="price"><?php echo get_field($postTR.'-price', $recomR); ?></div>
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
