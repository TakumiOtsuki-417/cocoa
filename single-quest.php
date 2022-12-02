<?php get_header(); ?>
<main>
  <div class="inner1000 flex73">
    <?php if(have_posts()): while(have_posts()): the_post();
    $outputnumber = get_field('output'); ?>
    <article class="article__quest">
      <h1><?php the_title(); ?></h1>
      <div class="block">
        <?php the_content(); ?>
        <div id="block-answer">
          <div id="nocheck-message">未回答の問題が残っています（赤背景のもの）。<br>全ての問題にチェック回答をしてください。</div>
          <input type="button" id="first-btn" value="答え合わせする！">
        </div>
      </div>
    </article>
    <?php endwhile; endif; ?>
    <div class="block block__linkquest">
        <h2>テキストを見返す？</h2>
        <?php
        $my_query = new WP_Query();
        $args = array(
          'post_type' => 'output',
          'meta_key' => 'output',
          'meta_value' => $outputnumber,
          'meta_compare' => '=',
        );
        $my_query->query( $args );
        if($my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();
        ?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php endwhile; else: ?>
          <p>このページに関連したテキストはありませぬ。</p>
        <?php endif; wp_reset_postdata(); ?>
      </div>
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
    <aside class="aside__quest">
      <?php get_template_part('sidebar'); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>