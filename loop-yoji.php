<?php
if($args['rank'] == "ランク3（赤）"){
  $rank = "red";
}elseif($args['rank'] == "ランク2（黄）"){
  $rank = "yellow";
}else{
  $rank = "blue";
}
$searchpage = $args["search"];
?>
<section class="yojipage yojirank__<?php echo $rank; ?>">
  <h2><?php echo $args['title']; ?></h2>
  <img class="yojipage__image" src="<?php echo $args['card']; ?>" alt="">
  <?php if(is_null($searchpage)==false): ?>
  <button class="accordion_ttl" type="button">詳細</button>
  <div class="accordion_cnt">
  <?php endif; ?>
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
  <?php if(is_null($searchpage)==false): ?>
  </div>
  <?php endif; ?>
</section>