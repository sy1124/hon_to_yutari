<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php //error_reporting(E_ALL | E_STRICT);
###############################################################################################
##
#  PHPメールプログラム　フリー版
#　改造や改変は自己責任で行ってください。
#
#  今のところ特に問題点はありませんが、不具合等がありましたら下記までご連絡ください。
#  MailAddress: info@php-factory.net
#  name: K.Numata
#  HP: http://www.php-factory.net/
#
#  重要！！サイトでチェックボックスを使用する場合のみですが。。。
#  チェックボックスを使用する場合はinputタグに記述するname属性の値を必ず配列の形にしてください。
#  例　name="当サイトをしったきっかけ[]"  として下さい。
#  nameの値の最後に[と]を付ける。じゃないと複数の値を取得できません！
##
###############################################################################################

// フォームページ内の「名前」と「メール」項目のname属性の値は特に理由がなければ以下が最適です。
// お名前 <input size="30" type="text" name="名前" />　メールアドレス <input size="30" type="text" name="Email" />
// メールアドレスのname属性の値が「Email」ではない場合、または変更したい場合は、以下必須設定箇所の「$Email」の値も変更下さい。


/*
★以下設定時の注意点　
・値（=の後）は数字以外の文字列はすべて（一部を除く）ダブルクオーテーション（"）、またはシングルクォーテーション（'）で囲んでいます。
・これをを外したり削除したりしないでください。後ろのセミコロン「;」も削除しないください。プログラムが動作しなくなります。
・またドルマーク（$）が付いた左側の文字列は絶対に変更しないでください。数字の1または0で設定しているものは必ず半角数字でお願いします。
*/


//---------------------------　必須設定　必ず設定してください　-----------------------

//サイトのトップページのURL　※デフォルトでは送信完了後に「トップページへ戻る」ボタンが表示されますので
$site_top = "http://hontoyutari.com/";

// 管理者メールアドレス ※メールを受け取るメールアドレス(複数指定する場合は「,」で区切ってください)
$to = "hontoyutari@hontoyutari.com";

//フォームのメールアドレス入力箇所のname属性の値（メール形式チェックに使用。※2重アドレスチェック導入時にも使用します）
$Email = "Email";

/*------------------------------------------------------------------------------------------------
以下スパム防止のための設定　※このファイルとフォームページが同一ドメイン内にある必要があります（XSS対策）
------------------------------------------------------------------------------------------------*/

//スパム防止のためのリファラチェック（フォームページが同一ドメインであるかどうかのチェック）(する=1, しない=0)
$Referer_check = 1;

//リファラチェックを「する」場合のドメイン ※以下例を参考に設置するサイトのドメインを指定して下さい。
$Referer_check_domain = "hontoyutari.com";

//---------------------------　必須設定　ここまで　------------------------------------


//---------------------- 任意設定　以下は必要に応じて設定してください ------------------------

// このPHPファイルの名前 ※ファイル名を変更した場合は必ずここも変更してください。
$file_name ="mailcon.php";

// 管理者宛のメールで差出人を送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性の値を「$Email」で指定した値にしてください。
//メーラーなどで返信する場合に便利なので「する」がおすすめです。
$userMail = 1;

// Bccで送るメールアドレス(複数指定する場合は「,」で区切ってください)
$BccMail = "";

// 管理者宛に送信されるメールのタイトル（件名）
$subject = "お問い合わせ";

// 送信確認画面の表示(する=1, しない=0)
$confirmDsp = 1;

// 送信完了後に自動的に指定のページ(サンクスページなど)に移動する(する=1, しない=0)
// CV率を解析したい場合などはサンクスページを別途用意し、URLをこの下の項目で指定してください。
// 0にすると、デフォルトの送信完了画面が表示されます。
$jumpPage = 1;

// 送信完了後に表示するページURL（上記で1を設定した場合のみ）※httpから始まるURLで指定ください。
$thanksPage = "http://hontoyutari.com/contact/con_thx/";
// 必須入力項目を設定する(する=1, しない=0)
$esse = 1;

/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲んで下さい。複数指定する場合は「,」で区切ってください)*/
$eles = array('お名前：姓','お名前：名','件名','お問い合わせ内容','Email');


//----------------------------------------------------------------------
//  自動返信メール設定(START)
//----------------------------------------------------------------------

// 差出人に送信内容確認メール（自動返信メール）を送る(送る=1, 送らない=0)
// 送る場合は、フォーム側のメール入力欄のname属性の値が上記「$Email」で指定した値と同じである必要があります
$remail = 1;

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "お問い合わせありがとうございました[本とゆたり]";

//フォーム側の「名前」箇所のname属性の値　※自動返信メールの「○○様」の表示で使用します。
//指定しない、または存在しない場合は、○○様と表示されないだけです。あえて無効にしてもOK
$dsp_name = '';

//自動返信メールの文言 ※日本語部分は変更可です
$remail_text = <<< TEXT

お問い合わせありがとうございました。
近日中にご返信致しますので今しばらくお待ちください。
尚、場合によりましてお返事を差し上げるまでお時間がかかる事がございます。

送信頂いた内容：

TEXT;


//自動返信メールに署名を表示(する=1, しない=0)※管理者宛にも表示されます。
$mailFooterDsp = 1;

//上記で「1」を選択時に表示する署名（FOOTER～FOOTER;の間に記述してください）
$mailSignature = <<< FOOTER

──────────────────────
有限会社時の広告社
出版メディア事業部内
ゆたり出版「本とゆたり事務局」
〒310-0912
茨城県水戸市見川5丁目302-1
電話：029-241-9216
FAX：029-305-5977
URL: http://hontoyutari.com/
──────────────────────

FOOTER;


//----------------------------------------------------------------------
//  自動返信メール設定(END)
//----------------------------------------------------------------------


//メールアドレスの形式チェックを行うかどうか。(する=1, しない=0)
//※デフォルトは「する」。特に理由がなければ変更しないで下さい。メール入力欄のname属性の値が上記「$Email」で指定した値である必要があります。
$mail_check = 1;

//------------------------------- 任意設定ここまで ---------------------------------------------



// 以下の変更は知識のある方のみ自己責任でお願いします。

//----------------------------------------------------------------------
//  関数定義(START)
//----------------------------------------------------------------------
function checkMail($str){
	$mailaddress_array = explode('@',$str);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) ==2){
		return true;
	}
	else{
		return false;
	}
}
function h($string) {
  return htmlspecialchars($string, ENT_QUOTES,'utf-8');
}
function sanitize($arr){
	if(is_array($arr)){
		return array_map('sanitize',$arr);
	}
	return str_replace("\0","",$arr);
}
if(isset($_GET)) $_GET = sanitize($_GET);//NULLバイト除去//
if(isset($_POST)) $_POST = sanitize($_POST);//NULLバイト除去//
if(isset($_COOKIE)) $_COOKIE = sanitize($_COOKIE);//NULLバイト除去//

//----------------------------------------------------------------------
//  関数定義(END)
//----------------------------------------------------------------------
$copyrights = '<a style="display:block;text-align:center;margin:15px 0;font-size:11px;color:#aaa;text-decoration:none" href="http://www.php-factory.net/" target="_blank">- PHP工房 -</a>';

if($Referer_check == 1 && !empty($Referer_check_domain)){
	if(strpos($_SERVER['HTTP_REFERER'],$Referer_check_domain) === false){
		echo '<p align="center">リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません</p>';exit();
	}
}
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm ='';
$header ='';

// 必須設定項目のチェック
if($esse == 1) {
	$length = count($eles) - 1;
	foreach($_POST as $key=>$val) {
		if($val != "confirm_submit"){
			for($i=0; $i<=$length; $i++) {
				if($key == $eles[$i] && empty($val)) {
					//TOKINO
					if($key=="Email"){
						$errm .= "<p class=\"error_messe\">「電子メール」は必須入力項目です。</p>\n";
					}else{
						$errm .= "<p class=\"error_messe\">「".$key."」は必須入力項目です。</p>\n";
					}
					//$errm .= "<p class=\"error_messe\">「".$key."」は必須入力項目です。</p>\n";
					$empty_flag = 1;
				}
			}
		}
	}
	foreach($_POST as $key=>$val) {
		for($i=0; $i<=$length; $i++) {
			if($key == $eles[$i]) {
				$eles[$i] = "confirm_ok";
			}
		}
	}
	for($i=0; $i<=$length; $i++) {
		if($eles[$i] != "confirm_ok") {
			$errm .= "<p class=\"error_messe\">「".$eles[$i]."」が未選択です。</p>\n";
			$eles[$i] = "confirm_ok";
			$empty_flag = 1;
		}
	}
}
//メールチェック
if(empty($errm)){
	foreach($_POST as $key=>$val) {
		if($val == "confirm_submit") $sendmail = 1;
		if($key == $Email) $post_mail = h($val);
		if($key == $Email && $mail_check == 1){
			if(!checkMail($val)){
				$errm .= "<p class=\"error_messe\">「".$key."」はメールアドレスの形式が正しくありません。</p>\n";
				$empty_flag = 1;
			}
		}
	}
}
// 管理者宛に届くメールの編集
$body="「".$subject."」からメールが届きました\n\n";
$body .="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
foreach($_POST as $key=>$val) {
	$out = '';
	if(is_array($val)){
		foreach($val as $item){
			$out .= $item . ', ';
		}
		$out = rtrim($out,', ');
	}else{ $out = $val;} //チェックボックス（配列）追記ここまで
	if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
	if($out != "confirm_submit" && $key != "httpReferer") {
		if($key!=="submit")$body.="【 ".$key." 】 ".$out."\n";
	}
}
$body.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
$body.="送信された日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
/*
$body.="送信者のIPアドレス：".$_SERVER["REMOTE_ADDR"]."\n";
$body.="送信者のホスト名：".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
*/
$body.="問い合わせのページURL：".@$_POST['httpReferer']."\n";
if($mailFooterDsp == 1) $body.= $mailSignature;
//--- 管理者宛に届くメールの編集終了


if($remail == 1) {
//--- 差出人への自動返信メールの編集
if(isset($_POST[$dsp_name])){ $rebody = h($_POST[$dsp_name]). " 様\n";}
$rebody.= $remail_text;
$rebody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
foreach($_POST as $key=>$val) {
	$out = '';
	if(is_array($val)){
		foreach($val as $item){
			$out .= $item . ', ';
		}
		$out = rtrim($out,', ');
	}else { $out = $val; }//チェックボックス（配列）追記ここまで
	if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
	if($out != "confirm_submit" && $key != "httpReferer"){
		if($key!=="submit")$rebody.="【 ".$key." 】 ".$out."\n";
	}
}
$rebody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
$rebody.="送信日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
if($mailFooterDsp == 1) $rebody.= $mailSignature;
//--- 差出人への自動返信メールの編集 終了

$reto = $post_mail;
$rebody=mb_convert_encoding($rebody,"JIS","utf-8");
$re_subject="=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS","utf-8"))."?=";

	if(!empty($refrom_name)){

		$default_internal_encode = mb_internal_encoding();
		if($default_internal_encode != 'utf-8'){
		  mb_internal_encoding('utf-8');
		}
		$reheader="From: ".mb_encode_mimeheader($refrom_name)." <".$to.">\nReply-To: ".$to."\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();

	}else{
		$reheader="From: $to\nReply-To: ".$to."\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	}
}
$body=mb_convert_encoding($body,"JIS","utf-8");
$subject="=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS","utf-8"))."?=";

if($userMail == 1 && !empty($post_mail)) {
  $from = $post_mail;
  $header="From: $from\n";
	  if($BccMail != '') {
		$header.="Bcc: $BccMail\n";
	  }
	$header.="Reply-To: ".$from."\n";
}else {
	  if($BccMail != '') {
		$header="Bcc: $BccMail\n";
	  }
	$header.="Reply-To: ".$to."\n";
}
	$header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();


if(($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1){
  mail($to,$subject,$body,$header);
  if($remail == 1) { mail($reto,$re_subject,$rebody,$reheader); }
}
else if($confirmDsp == 1){


/*　▼▼▼送信確認画面のレイアウト※編集可　オリジナルのデザインも適用可能▼▼▼　*/
?>
<!doctype html>
<html>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">
<title>確認画面｜お問い合わせ｜本とゆたり</title>
<meta name="description" content="お問い合わせ｜本とゆたり">
<meta name="keywords" content="お問い合わせ｜本とゆたり">
<meta name="viewport" content="width=1515">
<link rel="stylesheet" href="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/css/css01.css">
<link rel="stylesheet" href="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/css/common_form.css">
<link rel="stylesheet" href="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-contact/css/contact_common.css">
<link rel="stylesheet" href="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-contact/css/contact.css">

<!--スクリプトここから-->
<!--[if lt IE 9]><script src="../common/js/IE9.js"></script><![endif]-->
<!--[if lt IE 8]><script src="../common/js/selectivizr-1.0.2.js"></script><![endif]-->
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/smartRollover.js"></script>
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/jquery-1.9.1.min.js"></script>
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/jquery.placeholder.js"></script>
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/jquery.customSelect-0.5.1.js"></script>
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/page_top.js"></script>
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/fixHeight.mod.js"></script>
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/jquery.sidebar.fix.js"></script>
<script src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/js/import_script_pc.js"></script>
<!--スクリプトここまで-->

</head>

<body>
<?php include_once("/usr/home/aa210uz1th/html/google/analyticstracking.php") ?>

<!--ラッパーここから-->
<div id="wrapper">

<!--サイドバーここから-->
<div id="sidebar">
 <aside>

	 <!--サイドバーコンテンツここから-->
	 <div class="sidebar_contents">

		 <div id="site_logo">
			 <a href="http://hontoyutari.com/">
				 <img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/logo.png" width="142" height="265" alt="本とゆたり　BOOK AND YUTARI"></a>
		 </div>          <!--グローバルナビここから-->
			 <ul id="g_nav">
				 <li><a href="http://hontoyutari.com/book/"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/nav-book_off.png" width="114" height="26" alt="BOOK"></a></li>
				 <li><a href="http://hontoyutari.com/goods/"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/nav-goods_off.png" width="114" height="26" alt="GOODS"></a></li>
				 <li><a href="http://hontoyutari.com/project/"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/nav-project_off.png" width="114" height="26" alt="PROJECT"></a></li>
				 <li><a href="http://hontoyutari.com/shop/"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/nav-shop_list_off.png" width="114" height="26" alt="SHOP LIST"></a></li>
				 <li><a href="http://www.hontoyutari.com/wpkanrihttps://hontoyutari.stores.jp/" target="_blank"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/btn-online_store_off.png" width="168" height="51" alt="ONLINE STORE"></a></li>
				 <li><a href="http://hontoyutari.com/about/"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/nav-about_us_off.png" width="114" height="26" alt="ABOUT US"></a></li>
			 </ul>
			 <!--グローバルナビここまで-->

		 <!--アイコン各種ここから-->
		 <div id="yutari_icon">
			 <a href="http://www.hontoyutari.com/wpkanrihttp://yutari.jp/" target="_blank"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/sidebar/icon-yutari.png" width="38" height="38" alt="ゆたり"></a>
		 </div>

		 <!--アイコン各種ここまで-->
		 <div id="copy_right">&copy; 2015 Hon to yutari<br>
			 All Rights Reserved.</div>
		 </div>
 <!--サイドバーコンテンツここまで-->
 </aside>
</div>
<!--サイドバーここまで-->

<div id="container">
  <!--ヘッダー帯画像ここから-->
	<div id="page_ttl">
		<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-contact/image/img-page_header_contact.png" width="1300" height="195" alt="CONTACT">
	</div>
  <!--ヘッダー帯画像ここまで-->

  <!--メインここから-->
  <div id="contact_common">
    <div id="contact_contact" class="main">

      <article>
        <section>


          <!--コンテンツ（カラム版）ここから-->
          <div class="content_outline">

            <!--左ブロックここから-->
            <div class="left_block">
              <div class="left_block_inner">
                <div class="contact_ttl">送信確認</div>
                <!-- ▲ Headerやその他コンテンツなど　※編集可 ▲-->

                <!-- ▼************ 送信内容表示部　※編集は自己責任で ************ ▼-->
                <?php if($empty_flag == 1){ ?>
                <div class="red">入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</div><?php echo $errm; ?><br><br>
                <div class="ord"><input type="button" value=" 前画面に戻る " onclick="history.back()"></div>
                <?php
		}else{
?>
                <p>以下の内容で間違いがなければ、「送信する」ボタンを押してください。</p>
                <form action="<?php echo $file_name; ?>" method="POST">
                  <!--<table>-->
                  <table width="100%" class="wht" border="1" cellspacing="2" cellpadding="0">
                    <?php
foreach($_POST as $key=>$val) {
	$out = '';
	if(is_array($val)){
		foreach($val as $item){
			$out .= $item . ', ';
		}
		$out = rtrim($out,', ');
	}else { $out = $val; }//チェックボックス（配列）追記ここまで
	if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
	$out = nl2br(h($out));//※追記 改行コードを<br>タグに変換
	$key = h($key);
	/*if($key!=="submit")echo "<tr><td class=\"l_Cel\">".$key."</td><td>".$out;*/
	/**/
	if($key!=="submit"){
		if($key=="お問い合わせ内容"){
			echo "<div class=\"ttl\">".$key."</div><textarea id=\"お問い合わせ内容\" readonly>".$out."</textarea>";
		}else{
			echo "<div class=\"ttl\">".$key."</div><input type=\"text\" id=\"件名\" value=\"".$out."\" readonly>";
		}
	}
	/**/
	$out = str_replace("<br />","",$out);//※追記 メール送信時には<br>タグを削除
?>
                    <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $out; ?>">
                    <?php
	echo "</td></tr>\n";
}
?>
                    </table><br>
                  <div align="center"><input type="hidden" name="mail_set" value="confirm_submit">
                    <input type="hidden" name="httpReferer" value="<?php echo $_SERVER['HTTP_REFERER'] ;?>">
                    <div class="ord"><input type="submit" value="　送信する　"></div>
                    <div class="ord"><input type="button" value="内容を編集する" onclick="history.back()"></div>
                    </div>
                  </form>
                <?php } ?>
                <!-- ▲ *********** 送信内容確認部　※編集は自己責任で ************ ▲-->

                <!-- ▼ Footerその他コンテンツなど　※編集可 ▼-->
                <!--
</body>
</html>
-->
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
		              <li><a href="http://hontoyutari.com/privacy/">プライバシーポリシー</a></li>
		            </ul>
		          </div>

		          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3212.6929346915317!2d140.433794!3d36.368216!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x602224768eddad1f%3A0x203ff80fd8742398!2z5pyJ6ZmQ5Lya56S-5pmC44Gu5bqD5ZGK56S-!5e0!3m2!1sja!2sjp!4v1427166227140" width="387" height="205" frameborder="0" style="border:0"></iframe>

		        </div>
						          <!--右ブロックここまで-->

            </div>
          <!--コンテンツ（カラム版）ここまで-->


					<div id="page_top">
		        <a href="#wrapper"><img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
		      </div>


          </section>
        </article>



      </div>
  </div>
  <!--メインここまで-->
  <!--フッターここから-->
	<footer>
<div id="footer_nav">
	<table>
		<tr>
			<td><a href="http://hontoyutari.com/book/">
				<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/footer/nav-book_off.png" width="48" height="26" alt="BOOK"></a></td>
			<td><a href="http://hontoyutari.com/goods/">
				<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/footer/nav-goods_off.png" width="59" height="26" alt="GOODS"></a></td>
			<td><a href="http://hontoyutari.com/project/">
				<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/footer/nav-project_off.png" width="78" height="26" alt="PROJECT"></a></td>
			<td><a href="http://hontoyutari.com/shop/">
				<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/footer/nav-shop_list_off.png" width="96" height="26" alt="SHOP LIST"></a></td>
			<td><a href="http://hontoyutari.com/about/">
				<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/footer/nav-about_us_off.png" width="91" height="26" alt="ABOUT US"></a></td>
			<td><a href="http://hontoyutari.com/info/">
				<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/footer/nav-information_off.png" width="122" height="26" alt="INFORMATION"></a></td>
			<td><a href="http://hontoyutari.com/contact/">
				<img src="http://www.hontoyutari.com/wpkanri/wp-content/themes/hontoyutari/data-common/image/footer/nav-contact_off.png" width="81" height="26" alt="CONTACT"></a></td>
		</tr>
	</table>
</div>
</footer>
  <!--フッターここまで-->
</div>
</div>
<!--ラッパーここまで-->

</body>
</html>
<?php
/* ▲▲▲送信確認画面のレイアウト　※オリジナルのデザインも適用可能▲▲▲　*/
}


if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) {

/* ▼▼▼送信完了画面のレイアウト　編集可 ※送信完了後に指定のページに移動しない場合のみ表示▼▼▼　*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>お問い合わせ完了画面</title>
</head>
<body>
<div align="center">
<?php if($empty_flag == 1){ ?>
<h5>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h5><div style="color:red"><?php echo $errm; ?></div><br><br>
<div class="ord"><input type="button" value=" 前画面に戻る " onClick="history.back()"></div>
</div>
</body>
</html>
<?php
  }else{
?>
送信ありがとうございました。<br>
送信は正常に完了しました。<br><br>
<a href="<?php echo $site_top ;?>">トップページへ戻る⇒</a>
</div>
<?php if(!empty($copyrights)) echo $copyrights; ?>
<!--  CV率を計測する場合ここにAnalyticsコードを貼り付け -->
</body>
</html>
<?php
/* ▲▲▲送信完了画面のレイアウト 編集可 ※送信完了後に指定のページに移動しない場合のみ表示▲▲▲　*/
  }
}
//完了時、指定のページに移動する設定の場合、エラーチェックで問題が無ければ指定ページヘリダイレクト
else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) {
	 if($empty_flag == 1){ ?>
<div align="center"><h5>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h5><div style="color:red"><?php echo $errm; ?></div><br><br>
<div class="ord"><input type="button" value=" 前画面に戻る " onClick="history.back()"></div>
<?php }else{ header("Location: ".$thanksPage); }
} ?>
