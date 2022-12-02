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
      <ul class="yojiblocks">
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
        <li>
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
        </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </ul>
      <div class="block block__outputprevnext">
        <h2>次いく？</h2>
        <div id="prev_next" class="clearfix">
        <?php
          $prevpost = get_adjacent_post(false, '', true); //前の記事
          $nextpost = get_adjacent_post(false, '', false); //次の記事
          if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
            if ( $prevpost ) { //前の記事が存在しているとき
              echo '<a href="' . get_permalink($prevpost->ID) . '" title="' . get_the_title($prevpost->ID) . '" id="prev" class="clearfix">
              <div id="prev_title">＜ PREV</div>
              <p>' . get_the_title($prevpost->ID) . '</p></a>';
            } else { //前の記事が存在しないとき
              echo  '<div id="prev_no"></div>';
            }
            if ( $nextpost ) { //次の記事が存在しているとき
            echo '<a href="' . get_permalink($nextpost->ID) . '" title="'. get_the_title($nextpost->ID) . '" id="next" class="clearfix">
              <div id="next_title">NEXT ＞</div>
              <p>'. get_the_title($nextpost->ID) . '</p></a>';
            } else { //次の記事が存在しないとき
              echo '<div id="next_no"></div>';
            }
          } ?>
        </div><!-- /#prev_next -->
      </div>
    </article>
    <aside class="aside__output">
      <?php get_sidebar(); ?>
    </aside>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>