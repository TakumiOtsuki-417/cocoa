<?php get_header(); ?>
<main>
  <div class="inner1000 flex73">
    <article class="article__postarchive">
      <h1>エピソード</h1>
      <?php get_template_part("tab"); ?>
      <?php // 8セクションをループ
      for($count = 1; $count < 9; $count++): ?>
      <section class="phase phase<?php echo $count; ?> <?php if($count==1){ echo "phase-active"; } ?>">
        <h2>フェーズ<?php echo $count; ?></h2>
        <ul>
        <?php //エピソードページを選別
          $my_query = new WP_Query();
          $args = array(
              'post_type' => 'episode',
              'meta_key' => 'phase',
              'meta_value' => 'フェーズ'.$count,
              'meta_compare' => '=',
          );
          $my_query->query( $args ); //データ取得
          if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();
        ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <?php if(has_post_thumbnail()){the_post_thumbnail($prevpost->ID);}
              else{ echo '<img src="'.get_template_directory_uri().'/images/idefault.png">'; } ?>
              <p><?php the_title(); ?></p>
            </a>
          </li>
        <?php endwhile; else: ?>
          <li>このフェーズに属するエピソードページはまだ公開されていません。</li>
        <?php endif; wp_reset_postdata(); ?>
        </ul>
      </section>
      <?php endfor; ?>
    </article>
    <aside>
    <?php get_sidebar(); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>