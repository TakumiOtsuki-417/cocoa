<?php get_header(); ?>
<main>
  <div class="innerFull">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article class="article__about">
      <?php the_content(); ?>
    </article>
    <?php endwhile; endif; ?>
    <aside class="aside__about">
      <?php get_template_part("note"); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>