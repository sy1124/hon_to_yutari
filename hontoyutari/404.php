<?php get_header('arc');?>


<body>

<!--ラッパーここから-->
<div id="wrapper">
 <!--メインアウトラインここから-->

    <!--サイドバーここから-->
    <?php get_sidebar(); ?>
    <!--サイドバーここまで-->

   <!--コンテナーここから-->
  <div id="container">
   <!--ヘッダー帯画像ここから-->
    <div id="page_ttl">
      <img src="<?php bloginfo('template_directory'); ?>/data-info/image/img-page_header_info.png" width="1300" height="195" alt="PRIVACY POLICY">
    </div>
    <!--ヘッダー帯画像ここまで-->

    <!--メインここから-->
    <div id="info" class="main">
      <article>
        <section>
          <!--コンテンツ（カラム版）ここから-->
          <div class="content_outline">
            <div class="contents_column">
              <!--左ブロックここから-->
              <div class="left_block">
                <div class="left_block_inner">

                  <div class="ttl">ページが見つかりません</div>

                  <div class="ttl2">404 Not Found.</div>

                    <div id="topicBox">
                      <div id="entryBox">
                        <p>お探しのページは移動されたか削除された可能性があり、現在表示することができません。<br>
                        お手数ですが、ホームより戻り再度情報をお探しください。<br>
                      <br>
                    <a href="<?php bloginfo('url'); ?>">＞ホームへ戻る</a></p>
                      </div>
                    </div>
                </div>
              </div>
              <!--左ブロックここまで-->
            </div>
          </div>
          <!--コンテンツ（カラム版）ここまで-->
          <div id="page_top">
            <a href="#wrapper">
            <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP">
          </a>
          </div>

        </section>
      </article>
    </div>
    <!--メインここまで-->
   <!--メインアウトラインここまで-->

    <!--フッターここから-->
    <?php get_footer();?>
    <!--フッターここまで-->
  <!--コンテナーここまで-->
  </div>
</div>
<!--ラッパーここまで-->

</body>
</html>
