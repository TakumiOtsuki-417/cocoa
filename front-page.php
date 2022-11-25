<?php get_header();
$dire = get_template_directory_uri(); ?>
<main>
  <div class="innerFull">
    <article class="article__frontpage">
      <span class="tophoti"></span>
      <div class="fv">
        <h1><img src="<?php echo $dire; ?>/images/cocoafv.png" alt="諦めない四字熟語学習コメディ「ここあきすた！」"></h1>
      </div>
      <section class="news">
        <h2>更新履歴</h2>
        <ul>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <li><?php the_time(); ?> <?php the_title(); ?></li>
        <?php endwhile; endif; ?>
        </ul>
      </section>
      <section class="frontmenu">
        <h2>サイトメニューだよ！</h2>
        <ul>
          <li class="output"><h3><a href="/output"><img src="<?php echo $dire; ?>/images/frontoutput.png" alt=""></a></h3><p>ちょっぴり難しい四字熟語たちをいっぱい勉強するよ！</p></li>
          <li class="episode"><h3><a href="/episode"><img src="<?php echo $dire; ?>/images/frontepisode.png" alt=""></a></h3><p>稜泉学園のちょっとした生活を覗いてみてね！</p></li>
          <li class="quest"><h3><a href="#"><img src="<?php echo $dire; ?>/images/frontquest.png" alt=""></a></h3><p>ちょっとした四字熟語問題に挑戦！　ちゃんと答えられるかな？</p></li>
          <li class="character"><h3><a href="/characters"><img src="<?php echo $dire; ?>/images/frontcharacter.png" alt=""></a></h3><p>今回いっぱい活躍する稜泉学生を紹介するよ！</p></li>
          <li class="about"><h3><a href="/about"><img src="<?php echo $dire; ?>/images/frontabout.png" alt=""></a></h3></li>
        </ul>
      </section>
    </article>
    <aside class="aside__frontpage">
      <?php get_template_part("note"); ?>
    </aside>
  </div>
</main>
<?php get_footer(); ?>