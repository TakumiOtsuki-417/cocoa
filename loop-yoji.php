<section class="yojipage">
  <h2><?php echo $args['title']; ?></h2>
  <img class="yojipage__image" src="<?php echo $args['card']; ?>" alt="">
  <section class="yojipage__mean">
    <h3><?php echo $args['title']; ?>の意味</h3>
    <p><?php echo $args['mean']; ?></p>
  </section>
  <section class="yojipage__explanation">
    <h3><?php echo $args['title']; ?>の解説</h3>
    <?php echo apply_filters( 'the_content', $args['explanation'] ); ?>
  </section>
  <section class="yojipage__example">
    <h3><?php echo $args['title']; ?>の使用例</h3>
    <?php echo apply_filters( 'the_content', $args['example'] ); ?>
  </section>
</section>