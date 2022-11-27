<?php get_header(); ?>
<main>
  <div class="inner1000 flex73">
    <article class="article__quest">
      <h2>記事に関連した問題です（４択形式）！<br>以下の問題に答えてください。</h2>
      <?php the_content(); ?>
      <div id="block-answer">
        <div id="nocheck-message">未回答の問題が残っています（赤背景のもの）。<br>全ての問題にチェック回答をしてください。</div>
        <input type="button" id="first-btn" value="答え合わせする！">
      </div>
    </article>
    <aside class="aside__quest">
      <?php get_template_part('sidebar'); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>