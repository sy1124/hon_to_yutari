<?php
/*
Template Name: P-CON_THX
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
    <img src="<?php bloginfo('template_directory'); ?>/data-contact/image/img-page_header_contact.png" width="1300" height="195" alt="CONTACT">
  </div>
  <!--ヘッダー帯画像ここから-->

  <!--メインここから-->
  <div id="contact_common">
    <div id="contact_contact" class="main">



          <!--コンテンツ（カラム版）ここから-->
          <div class="content_outline">

            <!--左ブロックここから-->
            <div class="left_block">
              <div class="left_block_inner">


                <div class="contact_ttl">お問い合わせ：送信完了</div>

                <p>
                  お問い合わせありがとうございました。確認メールをお送りしました。<br />
                  数日経過しても確認メールが届かない場合は、お手数ですがお電話にてご連絡ください。
                  </p>

                </div>
              </div>
            <!--左ブロックここまで-->

            <!--右ブロックここから-->
            <div class="right_block">

              <!--時の広告社詳細ここから-->
              <div id="yutari_exp">

                <h1>有限会社時の広告社<br>
                  出版メディア事業部内<br>
                ゆたり出版「本とゆたり事務局」</h1>

                <div id="yutari_address">
                  〒310-0912<br>
                  茨城県水戸市見川5丁目302-1<br>
                  電話：029-241-9216<br>
                  FAX：029-305-5977
                </div>

              </div>
              <!--時の広告社詳細ここまで-->

              <div class="other_link">
                <ul>
                  <li><a href="<?php bloginfo('url'); ?>/privacy/">プライバシーポリシー</a></li>
                </ul>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3212.6929346915317!2d140.433794!3d36.368216!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x602224768eddad1f%3A0x203ff80fd8742398!2z5pyJ6ZmQ5Lya56S-5pmC44Gu5bqD5ZGK56S-!5e0!3m2!1sja!2sjp!4v1427166227140" width="387" height="205" frameborder="0" style="border:0"></iframe>

            </div>
            <!--右ブロックここまで-->

            </div>
          <!--コンテンツ（カラム版）ここまで-->


          <div id="page_top">
            <a href="#wrapper"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
          </div>

      </div>
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
