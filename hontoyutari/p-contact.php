<?php
/*
Template Name: CONTACT
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
    <div id="contact_contact" class="main">
    <!--メインコンテンツここから-->


      <!--コンテンツ（カラム版）ここから-->
      <div class="content_outline">
        <!--左ブロックここから-->
        <div class="left_block">
          <div class="left_block_inner">

            <form name="contact_form" method="post" action="<?php bloginfo('template_directory'); ?>/data-contact/mailcon.php">

              <div class="contact_ttl">お問い合わせ内容をご入力ください</div>

              <div class="ttl">お名前　<span class="red">＊</span></div>

              <div id="input_name">
                <table>
                  <tr>
                    <td><input type="text" id="お名前：姓" name="お名前：姓" class="contact_form" placeholder="姓｜" value=""></td>
                    <th>&nbsp;</th>
                    <td><input type="text" id="お名前：名" name="お名前：名" class="contact_form" placeholder="名｜" value=""></td>
                  </tr>
                </table>
              </div>

              <div class="ttl">メールアドレス　<span class="red">＊</span></div>
              <input type="text" id="Email" name="Email" value="">

              <!--<div class="ttl">メールアドレス（確認用）　　<span class="red">＊</span></div>
<input type="text" id="r_email" name="r_email" value="">-->

              <div class="ttl">件名　<span class="red">＊</span></div>
              <input type="text" id="件名" name="件名" value="">

              <div class="ttl">お問い合わせ内容　<span class="red">＊</span></div>
              <textarea id="お問い合わせ内容" name="お問い合わせ内容"></textarea>

              <div class="submit">
                <input class="btn" type="submit" id="submit" name="submit" value="送　信">
              </div>

            </form>

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
