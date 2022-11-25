<?php get_header(); ?>
<main>
  <div class="innerFull">
    <?php if(have_posts()): while(have_posts()): the_post();
    $desc = get_field('desc');
    $phase = get_field('phase');
    $currentid = get_the_ID();
    ?>
    <article class="article__episode">
      <h1><?php the_title(); ?></h1>
      <section class="description"><!-- description -->
        <div>
          <h2>あらすじ</h2>
        <?php echo apply_filters( 'the_content', $desc ); ?>
        </div>
      </section>
      <section class="content"><!-- content -->
        <h2>スタート！</h2>
          <?php the_content(); ?>
      </section>
    </article>
    <aside class="aside__episode">
      <h2>つづく！</h2>
      <section class="finish"><!-- finish -->
        <h3>声を聞かせて！</h3>
        <div class="sns">
          <?php get_template_part('sns'); ?>
        </div>
        <div class="scene">
          <div id="scenebg_black" class="background"></div>
          <div class="wrap">
            <h3>次のお話は...</h3>
            <div id="prev_next" class="clearfix">
              <?php
              $prevpost = get_adjacent_post(false, '', true); //前の記事
              $nextpost = get_adjacent_post(false, '', false); //次の記事
              if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
                if ( $prevpost ) { //前の記事が存在しているとき
                  echo '<a href="' . get_permalink($prevpost->ID) . '" title="' . get_the_title($prevpost->ID) . '" id="prev" class="clearfix">
                    <div id="prev_title">PREV</div>
                    ' . get_the_post_thumbnail($prevpost->ID, 'thumbnail') . '
                    <p>' . get_the_title($prevpost->ID) . '</p></a>';
                  } else { //前の記事が存在しないとき
                    echo  '<div id="prev_no"></div>';
                  }
                if ( $nextpost ) { //次の記事が存在しているとき
                  echo '<a href="' . get_permalink($nextpost->ID) . '" title="'. get_the_title($nextpost->ID) . '" id="next" class="clearfix">
                    <div id="next_title">NEXT</div>
                    ' . get_the_post_thumbnail($nextpost->ID, 'thumbnail') . '
                    <p>'. get_the_title($nextpost->ID) . '</p></a>';
                  } else { //次の記事が存在しないとき
                    echo '<div id="next_no"></div>';
                  }
                } ?>
            </div><!-- /#prev_next -->
          </div>
        </div>
        <?php //関連エピソードを選別する内ループ
          $my_query = new WP_Query();
          $args = array(
            'post_type' => 'episode',
            'meta_key' => 'phase',
            'meta_value' => $phase,
            'meta_compare' => '=',
            'order' => 'asc',
          );
          $my_query->query( $args ); //データ取得
          ?>
        <h3>関連エピソード！</h3>
        <ul class="relateds">
          <?php
            if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();
            $cid = get_the_ID();
            // アイキャッチ画像を取得
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'small');
          ?>
          <?php if($cid != $currentid): ?>
          <li><a href="<?php the_permalink(); ?>" class="relateds__link">
            <?php
              if (get_post_thumbnail_id($post->ID)) {
              echo '<figure><img src="' . $thumb_url[0] . '" alt=""></figure>';
              } else {
              // アイキャッチ画像が登録されていなかったときの画像
              echo '<figure><img src="' . get_template_directory_uri() . '/images/idefault.png" alt=""></figure>';
              }
            ?>
            <h4><?php the_title(); ?></h4>
        </a></li>
        <?php else: ?>
          <li>
          <?php
            if (get_post_thumbnail_id($post->ID)) {
            echo '<figure><img src="' . $thumb_url[0] . '" alt=""></figure>';
            } else {
            // アイキャッチ画像が登録されていなかったときの画像
            echo '<figure><img src="' . get_template_directory_uri() . '/images/idefault.png" alt=""></figure>';
            }
          ?>
          <h4><?php the_title(); ?></h4>
        </li>
        <?php endif; ?>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
      </section>
    </aside>
    <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>