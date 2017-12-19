<?php get_header('arc');?>

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
      <img src="<?php bloginfo('template_directory'); ?>/data-book/image/book_title.png" width="1300" height="195" alt="BOOK">
    </div>
    <!--ヘッダー帯画像ここまで-->

    <!--メインここから-->
    <div id="book_index" class="main">

      <article>
        <section>

          <!--コンテンツここから-->
          <div class="content_outline">
            <div class="contents">

              <!--検索結果ここから-->
              <div class="search_result_ttl">
                <!--ジャンル／茨城県／水戸周辺　の検索結果：-->
              </div>

              <div class="search_result">
                <div class="column_3 fixHeight">

                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                  <div class="box">
                    <a href="<?php the_permalink(); ?>">
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
                        <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-new.png" width="29" height="63" alt="NEW">
                        </div>
                        <?php endif; ?>


                      <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    </a>
                    <div class="more">
                      <div class="category fixHeightChild_01">
                        <?php the_field('book-sub'); ?>
                      </div>
                      <a href="<?php the_permalink(); ?>">
                      <div class="ttl fixHeightChild_02">
                        <?php the_field('book-title'); ?>
                      </div>
                      </a>
                      <div class="price fixHeightChild_03">
                        <?php the_field('book-price'); ?>

                      </div>
                      <!--<div class="detail"></div>-->
                    </div>
                  </div>

                  <?php endwhile; endif; ?>
                  <?php wp_reset_query(); ?>

                </div>
              </div>
              <!--検索結果ここまで-->

            </div>
          </div>
          <!--コンテンツここまで-->

          <div id="page_top">

            <div class="pager_box">
            <?php nom_posts_pagination(); ?>
            </div>

            <?php wp_reset_query(); ?>


            <a href="#wrapper"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
          </div>
          <!--メインコンテンツここから-->
        </section>
      </article>

    </div>
    <!--メインここまで-->

    <!--フッターここから-->
    <?php get_footer();?>
    <!--フッターここまで-->
  </div>
  <!--コンテナーここまで-->
</div>
<!--ラッパーここまで-->

</body>
</html>
