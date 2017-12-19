<!--レコメンドここから-->
<div id="recommend" class="fixHeight">

  <div class="left_contents">
    <table>
      <tr>
        <th><a href="<?php bloginfo('url'); ?>single-book">
          <img src="<?php the_field('reco-left-pic'); ?>" width="213" height="213" alt=""></a>
        </th>
        <td>
          <div class="category fixHeightChild_01">
            <?php the_field('reco-left-sub'); ?>
            </div>
          <div class="ttl fixHeightChild_02">
            <?php the_field('reco-left-title'); ?>
            </div>
          <div class="price fixHeightChild_03">
            <?php the_field('reco-left-price'); ?>
            </div>
          <a class="btn" href="https://hontoyutari.stores.jp/#!/items/552530bd3bcba9b822001356" target="_blank">
            <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-cart_off.png" width="230" height="55" alt="購入する"/></a>
          </td>
        </tr>
      </table>
    </div>

  <div class="right_contents">
    <table>
      <tr>
        <th><a href="<?php bloginfo('url'); ?>single-book"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/recommend/sam-book_kasama.png" width="213" height="213" alt=""></a></th>
        <td>
          <div class="category fixHeightChild_01">
            　<br>
            　　
            </div>
          <div class="ttl fixHeightChild_02">
            かさまのうつわ<br>
            　
            </div>
          <div class="price fixHeightChild_03">
            <!--<div class="status">近日発売</div>-->
            本体価格 ￥1,200＋税
            </div>
          <a href="https://hontoyutari.stores.jp/#!/items/554179e93bcba972aa004a0e" target="_blank">
            <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-cart_off.png" width="230" height="55" alt="購入する"/></a>
          </td>
        </tr>
      </table>
    </div>

  </div>
<!--レコメンドここまで-->
