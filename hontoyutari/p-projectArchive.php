<?php
/*
Template Name: PROJECT-ARCHIVE
*/
?>
<?php get_header('kotei');?>

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
      <img src="<?php bloginfo('template_directory'); ?>/data-project/image/project_title.png" width="1300" height="195" alt="PROJECT">
      </div>
    <!--ヘッダー帯画像ここから-->


    <!--メイン外側ここから-->
    <div id="project_common">


      <!--カスタム分類のスラッグを取得-->
      <?php $terms = get_the_terms( $post->ID, 'prjctcat' ); ?>
      <?php foreach ( $terms as $term ) { $termslug = $term ->slug; } ?>
      <!-- スラッグからページ情報を取得 -->
      <?php $pageinfo = get_page_by_path('prjctinfo/'.$termslug); ?>


      <!--メインここから-->
      <div class="main" id="project">
        <article>
          <section>

            <!--コンテンツここから-->
            <div class="content_outline">
              <div class="contents">


                <!--search_result-->
                <div class="search_result">
                  <div class="column_3 fixHeight">

                    <!--列処理ここから-->
                    <div class="line">

                      <?php $the_query = new WP_Query( array('posts_per_page' => -1, 'post_type' => 'page', 'orderby' =>'date', 'post_parent' => 504)); ?>
                      <?php if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                      <?php $pageslug = $post->post_name; ?>

                      <div class="box">
                      <a href="<?php bloginfo(url);?>/project/<?php echo $pageslug;?>">
                            <div class="inner">
                              <h1></h1>
                              <!--NEW帯
                              <div class="icon_new">
                                <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
                              </div>
                              -->
                            <!--画像出力ここから-->
                            <img src="<?php the_field('prjct-img');?>"/>
                            <!--画像出力ここまで-->
                        </a>
                        </div>

                        <div class="more">

                            <div class="exp fixHeightChild_01">
                              <?php the_field('prjct-disc');?>
                            </div>
                          <div class="detail">
                            <a class="btn" href="<?php bloginfo(url);?>/project/<?php echo $pageslug;?>">詳しく見る</a>
                          </div>
                        </div>
                      </div>

                      <?php endwhile; endif; ?>
                      <?php wp_reset_postdata(); ?>

                      <!--float解除のためのdiv-->
                      <div class="anti_float"></div>
                      <!--float解除のためのdiv-->

                    </div>
                    <!--列処理ここまで-->
                  </div>
                </div>
                <!--search_result-->

              </div>
            </div>
            <!--コンテンツここまで-->

            <div id="page_top">
              <a href="#wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
            </div>

          </section>
        </article>
      </div>
      <!--メインここまで-->
      </div>
      <!--メイン外側ここまで-->
    <!--フッターここから-->
    <?php get_footer();?>
    <!--フッターここまで-->
  </div>
<!--コンテナーここまで-->
</div>
<!--ラッパーここまで-->

</body>
</html>
