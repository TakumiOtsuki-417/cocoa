<?php get_header(); ?>
<main>
  <div class="inner1000 flex73">
    <article class="article__quest">
      <h2>記事に関連した問題です（４択形式）！<br>以下の問題に答えてください。</h2>
      <section id="block-quest-1" class="block-quest">
        <h3>問題文</h3>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢1" id="score_update_選択肢1" name="score_update[select1]">
          <label for="score_update_選択肢1">選択肢1</label>
        </div>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢2" id="score_update_選択肢2" name="score_update[select1]">
          <label for="score_update_選択肢2">選択肢2</label>
        </div>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢3" id="score_update_選択肢3" name="score_update[select1]">
          <label for="score_update_選択肢3">選択肢3</label>
        </div>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢4" id="score_update_選択肢4" name="score_update[select1]">
          <label for="score_update_選択肢4">選択肢4</label>
        </div>
        <div class="second-content">
          <h3>正解と解説</h3>
          <p class="correct-answer" data-correct="選択肢１">正解の選択肢です</p>
          <div>解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト</div>
        </div>
      </section>
      <section id="block-quest-2" class="block-quest">
        <h3>問題文</h3>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢1" id="score_update_選択肢1" name="score_update[select2]">
          <label for="score_update_選択肢1">選択肢1</label>
        </div>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢2" id="score_update_選択肢2" name="score_update[select2]">
          <label for="score_update_選択肢2">選択肢2</label>
        </div>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢3" id="score_update_選択肢3" name="score_update[select2]">
          <label for="score_update_選択肢3">選択肢3</label>
        </div>
        <div class="select-radio">
          <input class="quest-radio" type="radio" value="選択肢4" id="score_update_選択肢4" name="score_update[select2]">
          <label for="score_update_選択肢4">選択肢4</label>
        </div>
        <div class="second-content">
          <h3>正解と解説</h3>
          <p class="correct-answer" data-correct="選択肢１">正解の選択肢です</p>
          <div>解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト解説テキストテキストテキストテキスト</div>
        </div>
      </section>
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
<?php the_content(); ?>
<?php get_footer(); ?>