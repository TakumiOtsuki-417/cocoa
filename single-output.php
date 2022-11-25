<?php get_header(); ?>
<main>
  <div class="inner1000 flex73">
    <?php //アウトプット個別ページを１個出力する外ループ
    if(have_posts()): while(have_posts()): the_post();
    $outputnumber = get_field('output');
    $category = get_the_category();
    $currenturl = esc_url(get_permalink());
    ?>
    <article class="article__output">
      <h1>アウトプット開始<br><?php the_title(); ?></h1>
      <?php //四字熟語を選別する内ループ
      $my_query = new WP_Query();
      $args = array(
        'post_type' => 'yoji',
        'meta_key' => 'output',
        'meta_value' => $outputnumber,
        'meta_compare' => '=',
      );
      $my_query->query( $args ); //データ取得
      ?>
      <?php if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();?>
      <?php //内ループ毎に各情報を変数に渡す
      $args = array(
        'title' => get_the_title(),
        'card' => get_field('card'),
        'mean' => get_field('mean'),
        'explanation' => get_field('explanation'),
        'example' => get_field('example'),
        );
      get_template_part('loop-yoji', '', $args);
      ?>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </article>
    <aside class="aside__output">
      <?php get_sidebar(); ?>
    </aside>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>