<?php get_header();
global $post;
 ?>
<main>
  <div class="inner1000 flex73">
    <article>
      <h1>[<?php single_term_title(); ?>]から始まる...</h1>
      <?php
      $category = get_category( get_query_var('cat') );
      $my_query = new WP_Query(
        array(
          'post_type' => 'yoji',
          'cat' => $category->term_id,
          ));
        if ($my_query->have_posts()): while ($my_query->have_posts()): $my_query->the_post();
          $args = array(
            'title' => get_the_title(),
            'card' => get_field('card'),
            'mean' => get_field('mean'),
            'explanation' => get_field('explanation'),
            'example' => get_field('example'),
            );
            get_template_part('loop-yoji', '', $args);
          ?>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php else: ?>
          <p>投稿はありません。</p>
        <?php endif; ?>
    </article>
    <aside>
        <?php get_sidebar(); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>