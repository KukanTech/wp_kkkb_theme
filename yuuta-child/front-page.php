<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package yuuta
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php
      // 固定ページ一覧を取得して表示
      // TODO: サムネイルの表示
      // TODO: 内容の表示
      // TODO: 詳細ページに飛ばす場合はボタンを表示する
      // FIXME: なんかこの書き方イケてない。
      $pages = get_pages();
      foreach ( $pages as $p) {
        $option = '<div class="hentry__inside">';
        $option .= '<header class="entry-header">';
        $option .= '<h2 class="entry-title">';
        $option .= '<a href="' . get_page_link($p->ID) . '" rel="bookmark">';
        $option .= $p->post_title;
        $option .= '</a>';
        $option .= '</h2>';
        $option .= '<hr>';
        $option .= '</header>';
        $option .= '<div class="entry-content">';
        $option .= $p->post_content;
        $option .= '</div>';
        echo $option;
      }
    ?>

    <?php if ( have_posts() ) : ?>
      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          /* Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'template-parts/content', get_post_format() );
        ?>
      <?php endwhile; ?>
      <?php the_posts_navigation(); ?>
    <?php else : ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
