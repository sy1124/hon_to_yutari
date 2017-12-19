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

                  <div class="ttl">インフォメーション</div>

                  <div class="ttl2">新着情報</div>
                  <div id="sc">
                  <!--投稿ここから-->
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div id="topicBox">
                      <div id="timeBox">
                      <p><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time></p>
                      </div>
                        <a href="<?php the_permalink(); ?>">
                          <h3><?php the_title(); ?></h3>
                        </a>
                      <div id="entryBox">
                      <?php the_content(); ?>
                      </div>
                    </div>
                  <?php endwhile; endif; ?>

                  <!--投稿ここまで-->
                  </div>
                </div>
              </div>
              <!--左ブロックここまで-->

              <!--右ブロックここから-->
              <div class="right_block">
                <h4>NEW POSTS：</h4>
                <dl>
                <?php
                $args = array('numberposts'=>4);
                $postslist = get_posts( $args );
                foreach ($postslist as $post) :  setup_postdata($post); ?>
                <dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt><dd><?php the_time('Y年n月j日'); ?></dd>
                <?php endforeach; wp_reset_postdata(); ?>
                </dl>
                <h4>以前の記事：</h4>
                <ul>
                <?php wp_get_archives(array('type'=>'monthly','show_post_count'=>1)); ?>
                </ul>
              </div>
              <!--右ブロックここまで-->

            </div>
          </div>
          <!--コンテンツ（カラム版）ここまで-->
          <div id="page_top">
              <div class="pager_box">
              <?php nom_posts_pagination(); ?>
              </div>
  <?php wp_reset_query(); ?>
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
