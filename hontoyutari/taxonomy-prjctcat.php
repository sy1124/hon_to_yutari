<?php get_header('arc');?>

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
      <img src="<?php bloginfo('template_directory'); ?>/data-project/image/project_title.png" width="1300" height="195" alt="PROJECT">
    </div>
    <!--ヘッダー帯画像-->

    <!--メインここから-->
    <div id="project_list" class="main">
      <article>
        <section>
          <!-- 表示中のページのタームオブジェクトを取得 -->
          <?php $catinfo = get_term_by('slug', $term, $taxonomy);?>
          <!-- スラッグからページ情報を取得 -->
          <?php $pageinfo = get_page_by_path('prjctinfo/'.$catinfo->slug);?>

          <!--コンテンツここから-->
          <div class="content_outline">
            <div class="contents">

              <div class="project_ttl">
                <table>
                  <tr>
                    <th>
                      <img src="<?php bloginfo('template_directory'); ?>/data-project/image/index/<?php echo $catinfo->slug;?>.png"  alt="">
                    </th>
                    <td><h1><?php the_field('prjct-name' ,$pageinfo->ID);?></h1>
          					</td>
                  </tr>
                </table>
              </div>

              <h2><?php the_field('prjct-lead' ,$pageinfo->ID);?></h2>

              <!--このプロジェクトについてここから-->
              <div id="about_project">
                <div class="exp">
                  <p>

                    <?php echo $pageinfo->post_content; ?>

                  </p>
                </div>
                <div class="sam">
                  <?php echo get_the_post_thumbnail($pageinfo, array(410,230)); ?>
                </div>
              </div>
              <!--このプロジェクトについてここまで-->
              <div class="main_ttl">
                <img src="<?php bloginfo('template_directory'); ?>/data-project/image/ttl-contents.png" width="94" height="43" alt="">
              </div>

              <!--プロジェクトコンテンツここから-->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div id="project_contents">
                <table>
                  <tr>
                    <th>
                      <div class="sam">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(array( 340, 190 )); ?>
                        </a>
                      </div>
                    </th>
                    <td>
                      <p class="num"><?php echo $catinfo->name;?></p>
                      <h3><?php the_field('project_header'); ?></h3>
                      <div class="address">

                        <?php
                          $tarms = get_the_terms( $post->ID,'genepref');
                          foreach ( $tarms as $tarm ) {
                              $tarmdesc = $tarm->name;
                          }
                        ?>
                        <?php echo $tarmdesc; ?>

                        <?php
                          $tarms = get_the_terms( $post->ID,'genearea');
                          foreach ( $tarms as $tarm ) {
                              $tarmdesc = $tarm->name;
                          }
                        ?>
                        <?php echo $tarmdesc; ?>


                      </div>
                      <div class="detail">
                        <div class="detail_btn">
                          <a class="btn" href="<?php the_permalink(); ?>">詳しく見る </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>

              </div>
              <!--プロジェクトコンテンツここまで-->
                  <?php endwhile; endif; ?>
                  <?php wp_reset_query(); ?>

            </div>
          </div>
          <!--コンテンツここまで-->

          <!--ページャーここから-->
          <div class="pager">
            <table>
              <tr>
                <th>&nbsp;</th>
                <td><a href="<?php bloginfo('url');?>/project/">
                  <img src="<?php bloginfo('template_directory'); ?>/data-project/image/btn-other_project.png" alt="他のプロジェクトを見る" width="183" height="36"></a>
                </td>
                <th>&nbsp;</th>
              </tr>
            </table>
          </div>
          <!--ページャーここまで-->

          <div id="page_top">
            <a href="#wrapper"><img src="<?php bloginfo('template_directory'); ?>/data-common/image/contents/btn-page_top.png" width="57" height="57" alt="PAGE TOP"></a>
          </div>

        </section>
      </article>

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
