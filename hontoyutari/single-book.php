<?php get_header('single');?>

<body>
<?php include_once("/usr/home/aa210uz1th/html/google/analyticstracking.php") ?>

<!--ラッパーここから-->
<div id="wrapper">


<!--サイドバーここから-->
<?php get_sidebar(); ?>
<!--サイドバーここまで-->

<!--コンテナーここから-->
<div id="container">

  <!--ヘッダー帯画像-->
  <div id="page_ttl">
    <img src="<?php bloginfo('template_directory'); ?>/data-book/image/book_title.png" width="1300" height="195" alt="BOOK">
  </div>
  <!--ヘッダー帯画像-->

  <!--メインここから-->
  <div id="book_common">
    <div id="book" class="main">

      <article>
        <section>
          <!--コンテンツ（カラム版）ここから-->
          <div class="content_outline">
            <div class="contents_column">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


              <!--左ブロックここから-->
              <div class="left_block">
                <div class="left_block_inner">
                  <?php if(have_rows('book-gallery')) : ?>
                      <div id="photo_container">
                        <!--mainphoto-->
                        <div id="main_photo">
                        </div>
                        <!--mainphoto-->

                        <!--thumbnails-->
                        <ul id="thumbnail">
                          <?php while(have_rows('book-gallery')) : the_row(); ?>
                            <?php
                            $photo= get_sub_field('book-gallery-item');
                            ?>

                          <li><a href="<?php echo $photo['url']; ?>">
                            <img src="<?php echo $photo['sizes']['thumbnail']; ?>"></a></li>
                            <?php endwhile; ?>
                        </ul>
                        <!--thumbnails-->
                      </div>
                    <?php else :?>
                      <?php the_post_thumbnail('full'); ?>
                    <?php endif; ?>


                  <strong><?php the_field('book-lead'); ?></strong>

                    <?php the_content(); ?>

                  <!--<div class="alrt">※写真はサンプルです。実際のものとは多少異なる場合がございます。</div>-->

                  </div>
                </div>
              <!--左ブロックここまで-->

              <!--右ブロックここから-->
              <div class="right_block">

                <!--書籍詳細ここから-->
                <div id="book_exp">
                  <h1><?php the_field('book-title'); ?></h1>
                  <div class="category">
                    <?php the_field('book-sub'); ?>
                  </div>
                  <div class="author">
                  <?php the_field('book-hosoku'); ?>
                    </div>
                  <div class="price">
                    <?php the_field('book-price'); ?>
                    </div>
                    <?php the_field('book-notice'); ?>
                  <div class="sns_icon">
                    <ul>
                      <li>
                        <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'FBwindow', 'width=560, height=550, menubar=no, toolbar=no, scrollbars=yes'); return false;">
                        <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-facebook.png" width="20" height="21" alt="Facebook"></a>
                      </li>
                      <li>
                        <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;via=yutariya&amp;hashtags=#本とゆたり" title="Twitter" onclick="window.open(this.href, 'tweetwindow', 'width=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1'); return false;">
                        <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/icon-twitter.png" width="20" height="21" alt="twitter"></a>
                      </li>
                      </ul>
                    </div>
                    <!--購入ボタン-->
                    <?php if(have_rows('book-btn')):?>
                    <dl>
                    <?php while(have_rows('book-btn')): the_row();?>
                      <?php if( get_sub_field('book-stock') ):?>
                      <dt><span class="btn_disable">品切れ中</span></dt>
                      <dd><?php the_sub_field('book-btn-detail'); ?></dd>
                      <?php else :?>
                      <dt><?php the_sub_field('book-btn-code'); ?></dt>

                            <?php if( get_sub_field('book-btn-detail') ):?>
                            <dd><?php the_sub_field('book-btn-detail'); ?></dd>
                            <?php endif; ?>

                      <?php endif; ?>
                    <?php endwhile;?>
                    </dl>
                    <div class="author">※当サイトのショッピングカートは<br>　<a target="_blank" href="https://hontoyutari.stores.jp/">STORES.jp</a>を利用しています。</div>
                  <?php endif; ?>
                    <!--購入ボタン-->
                  </div>
                <!--書籍詳細ここまで-->

                <!--カテゴリーメニューここから-->
                <div id="category_menu">


                  </div>
                <!--カテゴリーメニューここまで-->

                </div>
              <!--右ブロックここまで-->
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>

              </div>
            </div>
          <!--コンテンツ（カラム版）ここまで-->

          <div id="page_top">
            <a href="#wrapper">
              <img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
            </div>
          </section>
        </article>
      </div>
  </div>
  <!--メインここまで-->
  <!--フッターここから-->
  <?php get_footer();?>
  <!--フッターここまで-->
<!--コンテナーここまで-->
</div>
</div>
<!--ラッパーここまで-->

</body>
</html>
