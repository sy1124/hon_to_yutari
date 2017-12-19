//モバイルデバイスの判定。PCならロールオーバー用コードをアクティブにする
if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') > 0) || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') == -1 )||(navigator.userAgent.indexOf('Android') == -1 && navigator.userAgent.indexOf('iPhone') == -1 )) {
  var rollover = function() {
    if(document.getElementsByTagName) {
      var img = document.getElementsByTagName('img');
      //画像をプリロードする際にイメージオブジェクトを突っ込むための配列
      var preImg = [];
      for (var i=-1,j=-1,n=img.length; ++i < n;) {
        //ファイル名に「_off.」がある場合にプリロード画像を配列に突っ込んだりロールオーバー処理を実行
        if (img[i].getAttribute('src').match(/_off\./)) {
          //配列にイメージオブジェクトを作成
          preImg[++j] = new Image();
          //イメージオブジェクトにsrc属性の値を設定して画像をプリロード
          preImg[j].src = img[i].getAttribute("src").replace("_off.", "_on.");
          img[i].onmouseover = function() {
            this.setAttribute('src', this.getAttribute('src').replace('_off.', '_on.'));
	      $("body a:hover").css('opacity', '1');
          };
          img[i].onmouseout = function() {
            this.setAttribute('src', this.getAttribute('src').replace('_on.', '_off.'));
          };
        }
      }
    }
  };
  if(window.addEventListener) {
    window.addEventListener("load", rollover, false);
  }
  else if(window.attachEvent) {
    window.attachEvent("onload", rollover);
  }
}
