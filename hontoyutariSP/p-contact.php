<?php
/*
Template Name: CONTACT
*/
?>

<?php get_header('kotei');?>

<!--ページタイトルここから-->
<div id="page_ttl">
<p><img src="<?php bloginfo('template_directory'); ?>/data-contact/image/common/ttl-page_header_CO.png" width="282" height="22" alt="PRIVACY POLICY"/></p>
</div>
<!--ページタイトルここまで-->

<!--メインここから-->
<div id="contact_common">
<div id="contact" class="main">
<article>
<section>

<!--コンテンツここから-->
<div class="contents">
<form name="contact_form" method="post" action="<?php bloginfo('template_directory'); ?>/data-contact/mailcon.php">

  <div class="contact_ttl">お問い合わせ内容をご入力ください</div>

  <div class="ttl">お名前　<span class="red">＊</span></div>

  <div id="input_name">
    <table>
      <tr>
        <td><input type="text" id="お名前：姓" name="お名前：姓" class="contact_form" placeholder="姓｜" value="" ></td>
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
  <div id="sbj"><input type="text" id="件名" name="件名" value=""></div>

  <div class="ttl">お問い合わせ内容　<span class="red">＊</span></div>
  <div id="txtarea"><textarea id="お問い合わせ内容" name="お問い合わせ内容"></textarea></div>

  <div class="other_link">
  <ul><li><a href="<?php bloginfo('url');?>/privacy/"><span></span>プライバシーポリシー</a></li></ul>
  </div>

  <div class="submit">
    <input class="btn" type="submit" id="submit" name="submit" value="送　信">
    </div>

</form>

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
<footer>
<?php get_footer(); ?>
</footer>
<!--フッターここまで-->

</div>
<!--ラッパーここまで-->
</body>
</html>
