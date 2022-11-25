<?php if(is_archive(array("output", "episode", "quest"))): ?>
<div class="phasetab"><!-- フェーズのタブ -->
  <p class="phasetab__text" id="aaa">フェーズを選んでね</p>
  <ul>
  <?php for($count = 1; $count < 9; $count++): ?>
    <li class="tablist <?php if($count==1){ echo "active"; } ?>" data-tablistnum="<?php echo $count; ?>"><?php echo $count; ?></li>
  <?php endfor; ?>
  </ul>
</div>
<? endif; ?>
<?php if(is_page('characters')): ?>
  <div class="phasetab"><!-- フェーズじゃないけど -->
  <p class="phasetab__text" id="aaa">誰かを選んでね</p>
  <ul>
    <li class="tabchara tablist active" data-tablistnum="1"><img src="<? echo get_template_directory_uri(); ?>/images/faces/cocoa1.png" alt="ココア"></li>
    <li class="tabchara tablist" data-tablistnum="2"><img src="<? echo get_template_directory_uri(); ?>/images/faces/yura1.png" alt="ユラ"></li>
    <li class="tabchara tablist" data-tablistnum="3"><img src="<? echo get_template_directory_uri(); ?>/images/faces/hako1.png" alt="ハコ"></li>
    <li class="tabchara tablist" data-tablistnum="4"><img src="<? echo get_template_directory_uri(); ?>/images/faces/other1.png" alt="バ会長"></li>
    <li class="tabchara tablist" data-tablistnum="5"><img src="<? echo get_template_directory_uri(); ?>/images/faces/other2.png" alt="タマ"></li>
    <li class="tabchara tablist" data-tablistnum="6"><img src="<? echo get_template_directory_uri(); ?>/images/faces/yusa1.png" alt="ユサ"></li>
    <li class="tabchara tablist" data-tablistnum="7"><img src="<? echo get_template_directory_uri(); ?>/images/faces/dumbbell1.png" alt="ダンベル"></li>
    <li class="tabchara tablist" data-tablistnum="8"><img src="<? echo get_template_directory_uri(); ?>/images/faces/other2.png" alt="ウミナリ"></li>
    <li class="tabchara tablist" data-tablistnum="9"><img src="<? echo get_template_directory_uri(); ?>/images/faces/other1.png" alt="マキ"></li>
  </ul>
  </div>
<?php endif; ?>