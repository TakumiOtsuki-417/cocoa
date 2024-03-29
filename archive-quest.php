<?php //ほぼほぼoutputと同じでよかろう
get_header(); ?>
<main>
  <div class="inner1000 flex73">
    <article class="article__postarchive">
      <h1>復習チャレンジ！</h1>
      <div class="block">
        <?php get_template_part("tab"); ?>
        <?php // 8セクションをループ
        for($count = 1; $count < 9; $count++): ?>
        <section class="phase phase<?php echo $count; ?> <?php if($count==1){ echo "phase-active"; } ?>">
          <h2>フェーズ<?php echo $count; ?></h2>
          <ul>
          <?php //アウトプットページを選別
            $my_query = new WP_Query();
            $args = array(
                'post_type' => 'quest',
                'meta_key' => 'phase',
                'meta_value' => 'フェーズ'.$count,
                'meta_compare' => '=',
            );
            $my_query->query( $args ); //データ取得
            if( $my_query->have_posts() ): while( $my_query->have_posts() ) : $my_query->the_post();
          ?>
            <li>
              <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
            </li>
          <?php endwhile; else: ?>
            <li>このフェーズに属するクエストページはまだ公開されていません。</li>
          <?php endif; wp_reset_postdata(); ?>
          </ul>
        </section>
        <?php endfor; ?>
        <section class="tipsAccordion">
          <?php get_template_part('accordion'); ?>
        </section>
      </div>
    </article>
    <aside  class="aside__postarchive">
    <?php get_sidebar(); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>