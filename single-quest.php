<?php get_header(); ?>
<main>
  <div class="inner1000 flex73">
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
    <aside class="aside__quest">
      <?php get_template_part('sidebar'); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>