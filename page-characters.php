<?php get_header(); ?>
<main>
  <div class="inner1000 flex73">
    <article class="article__characters">
      <h1>キャラクター</h1>
      <div class="block">
        <section class="tab charatab">
          <?php get_template_part("tab"); ?>
        </section>
        <?php the_content(); ?>
      </div>
    </article>
    <aside>
      <?php get_sidebar(); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>