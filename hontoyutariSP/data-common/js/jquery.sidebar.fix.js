jQuery(window).load(function() {
	//該当のセレクタなどを代入
	var mainArea = jQuery("#wrapper"); //メインコンテンツ
	var sideWrap = jQuery("#sidebar"); //サイドバーの外枠
	var sideArea = jQuery(".sidebar_contents"); //サイドバー
	/*設定ここまで*/


	var wd = jQuery(window); //ウィンドウ自体


	//メインとサイドの高さを比べる
	var mainH = mainArea.height();
	var sideH = sideWrap.height();


	if(sideH < mainH) { //メインの方が高ければ色々処理する
		//サイドバーの外枠をメインと同じ高さにしてrelaltiveに（#sideをポジションで上や下に固定するため）
		sideWrap.css({"height": mainH,"position": "relative"});
		//サイドバーがウィンドウよりいくらはみ出してるか
		var sideOver = wd.height()-sideArea.height();
		//固定を開始する位置 = サイドバーの座標＋はみ出す距離
		var starPoint = sideArea.offset().top + (-sideOver);
		//固定を解除する位置 = メインコンテンツの終点
		var breakPoint = sideArea.offset().top + mainH;


		wd.scroll(function() { //スクロール中の処理
			if(wd.height() < sideArea.height()){ //サイドメニューが画面より大きい場合
				if(starPoint < wd.scrollTop() && wd.scrollTop() + wd.height() < breakPoint){ //固定範囲内
					sideArea.css({"position": "fixed", "top": "0", bottom: "0", "left": "auto"});
				}else if(wd.scrollTop() + wd.height() >= breakPoint){ //固定解除位置を超えた時
					sideArea.css({"position": "absolute", "bottom": "0", "margin-left": "auto"});
				} else { //その他、上に戻った時
					sideArea.css({"position": "static", "margin-left": "auto", "margin-left": "auto"});
				}
			}else{ //サイドメニューが画面より小さい場合
				var sideBtm = wd.scrollTop() + sideArea.height(); //サイドメニューの終点
				if(mainArea.offset().top < wd.scrollTop() && sideBtm < breakPoint){ //固定範囲内
					sideArea.css({"position": "fixed", "top": "0", "left": "auto", "margin-left": -wd.scrollLeft()+'px'});
				}else if(sideBtm >= breakPoint){ //固定解除位置を超えた時
					//サイドバー固定場所（bottom指定すると不具合が出るのでtopからの固定位置を算出する）
					var fixedSide = mainH - sideH;
					sideArea.css({"position": "absolute", "top": fixedSide, "margin-left": "auto"});
				} else {
					sideArea.css({"position": "static", "margin-left": "auto"});
				}
			}
		});


	}

});