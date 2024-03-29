<?php
// カスタムメニューの「場所」を設定
register_nav_menu( 'global-navi', 'グローバルナビ' );
// アイキャッチ画像を導入
add_theme_support('post-thumbnails');
// 記事の自動整形を無効にする
remove_filter('the_content', 'wpautop');

// ■■■■■■■■■■■■■■■■■■■■■■■
// CSS、JSを出力
// ■■■■■■■■■■■■■■■■■■■■■■■
define("DIRE", get_template_directory_uri());
define("DIREC", get_stylesheet_directory());
function add_files() {
  wp_enqueue_style( 'argument', DIRE.'/scss/argument.css', array(), date("ymdHis", filemtime( DIREC.'/scss/argument.css')));
  wp_enqueue_style( 'reset', DIRE.'/scss/reset.css', array(), date("ymdHis", filemtime( DIREC.'/scss/reset.css')));
  wp_enqueue_style( 'base', DIRE.'/scss/base.css', array(), date("ymdHis", filemtime( DIREC.'/scss/base.css')));
  wp_enqueue_style( 'sidebar', DIRE.'/scss/sidebar.css', array(), date("ymdHis", filemtime( DIREC.'/scss/sidebar.css')));
  wp_enqueue_style( 'nav', DIRE.'/scss/nav.css', array(), date("ymdHis", filemtime( DIREC.'/scss/nav.css')));
  wp_enqueue_style( 'act', DIRE.'/scss/act.css', array(), date("ymdHis", filemtime( DIREC.'/scss/act.css')));
  wp_enqueue_style( 'yojipage', DIRE.'/scss/yojipage.css', array(), date("ymdHis", filemtime( DIREC.'/scss/yojipage.css')));
  if(is_page('about')){
    wp_enqueue_style( 'pageabout', DIRE.'/scss/pageabout.css', array(), date("ymdHis", filemtime( DIREC.'/scss/pageabout.css')));
    wp_enqueue_style( 'scene', DIRE.'/scss/scene.css', array(), date("ymdHis", filemtime( DIREC.'/scss/scene.css')));
    wp_enqueue_style( 'product', DIRE.'/scss/product.css', array(), date("ymdHis", filemtime( DIREC.'/scss/product.css')));
    wp_enqueue_script( 'scenejs', DIRE.'/js/scene.js' , array(), date("ymdHis", filemtime( DIREC.'/js/scene.js')));
  }
  if(is_page('characters')){
    wp_enqueue_style( 'tab', DIRE.'/scss/tab.css', array(), date("ymdHis", filemtime( DIREC.'/scss/tab.css')));
    wp_enqueue_style( 'pagecharacter', DIRE.'/scss/pagecharacter.css', array(), date("ymdHis", filemtime( DIREC.'/scss/pagecharacter.css')));
    wp_enqueue_script( 'tabjs', DIRE.'/js/tab.js' , array(), date("ymdHis", filemtime( DIREC.'/js/tab.js')));
  }
  if(is_front_page()){
    wp_enqueue_style( 'frontpage', DIRE.'/scss/frontpage.css', array(), date("ymdHis", filemtime( DIREC.'/scss/frontpage.css')));
    wp_enqueue_style( 'product', DIRE.'/scss/product.css', array(), date("ymdHis", filemtime( DIREC.'/scss/product.css')));
  }
  if(is_singular(array("output", "episode"))){
    wp_enqueue_script( 'actjs', DIRE.'/js/act.js' , array(), date("ymdHis", filemtime( DIREC.'/js/act.js')));
  }
  if(is_singular("episode")){
    wp_enqueue_style( 'episode', DIRE.'/scss/episode.css', array(), date("ymdHis", filemtime( DIREC.'/scss/episode.css')));
    wp_enqueue_style( 'scene', DIRE.'/scss/scene.css', array(), date("ymdHis", filemtime( DIREC.'/scss/scene.css')));
    wp_enqueue_script( 'scenejs', DIRE.'/js/scene.js' , array(), date("ymdHis", filemtime( DIREC.'/js/scene.js')));
  }
  if(is_archive(array("output", "episode", "quest"))){
    wp_enqueue_style( 'postarchive', DIRE.'/scss/postarchive.css', array(), date("ymdHis", filemtime( DIREC.'/scss/postarchive.css')));
    wp_enqueue_style( 'tab', DIRE.'/scss/tab.css', array(), date("ymdHis", filemtime( DIREC.'/scss/tab.css')));
    wp_enqueue_script( 'tabjs', DIRE.'/js/tab.js' , array(), date("ymdHis", filemtime( DIREC.'/js/tab.js')));
    wp_enqueue_script( 'accordionjs', DIRE.'/js/accordion.js' , array(), date("ymdHis", filemtime( DIREC.'/js/accordion.js')));
  }
  if(is_singular("quest")){
    wp_enqueue_style( 'quest', DIRE.'/scss/quest.css', array(), date("ymdHis", filemtime( DIREC.'/scss/quest.css')));
    wp_enqueue_script( 'questjs', DIRE.'/js/quest.js' , array(), date("ymdHis", filemtime( DIREC.'/js/quest.js')));
  }
  if((is_category()) || (is_search())){
    wp_enqueue_style( 'postarchive', DIRE.'/scss/postarchive.css', array(), date("ymdHis", filemtime( DIREC.'/scss/postarchive.css')));
    wp_enqueue_script( 'accordionjs', DIRE.'/js/accordion.js' , array(), date("ymdHis", filemtime( DIREC.'/js/accordion.js')));
  }
}
add_action( 'wp_enqueue_scripts', 'add_files' );
// ■■■■■■■■■■■■■■■■■■■■■■■
// 凡庸的ショートコード
// ■■■■■■■■■■■■■■■■■■■■■■■
function imageDirectoryLink ($atts, $content = null) {
  $content = do_shortcode (shortcode_unautop ($content));
return '<img src="'.get_template_directory_uri().'/images/'.$content.'.png">';
}
add_shortcode ('direimg', 'imageDirectoryLink');
// ■■■■■■■■■■■■■■■■■■■■■■■
// Act系列ショートコード
// ■■■■■■■■■■■■■■■■■■■■■■■
function actExplanationText ($atts, $content = null) {
  $content = do_shortcode (shortcode_unautop ($content));
return "<p>".$content."</p>";
}
add_shortcode ('aetext', 'actExplanationText');
function actExampleVoice ($atts, $content = null) {
  extract(shortcode_atts( array(
    'face' => 'other3',
    'name' => '???',
  ), $atts ));
  $content = do_shortcode (shortcode_unautop ($content));
  return '<div class="act act-'.$face.'">
    <div class="act__face">
      <img src="'.get_template_directory_uri().'/images/faces/'.$face.'.png" alt="">
    </div>
    <div class="act__content">
      <div class="name">
        '.$name.'
      </div>
      <p>'.$content.'</p>
    </div>
  </div>';
}
add_shortcode ('aevoice', 'actExampleVoice');
function redSpan ($atts, $content = null) {
  $content = do_shortcode (shortcode_unautop ($content));
return '<span class="red">'.$content.'</span>';
}
add_shortcode ('red', 'redSpan');
function bigSpan ($atts, $content = null) {
  $content = do_shortcode (shortcode_unautop ($content));
return '<span class="big">'.$content.'</span>';
}
add_shortcode ('big', 'bigSpan');
function objectiveTextBox ($atts, $content = null) {
  $content = do_shortcode (shortcode_unautop ($content));
return '<div class="objectiveBox">'.$content.'</div>';
}
add_shortcode ('otbox', 'objectiveTextBox');
function objectiveText ($atts, $content = null) {
  $content = do_shortcode (shortcode_unautop ($content));
return "<p>".$content."</p>";
}
add_shortcode ('otext', 'objectiveText');
function rbSpan ($atts, $content = null) {
  extract(shortcode_atts( array(
    'rb' => '???',
  ), $atts ));
  $content = do_shortcode (shortcode_unautop ($content));
  return '<span rb="'.$rb.'">'.$content.'</span>';
}
add_shortcode ('rb', 'rbSpan');
// ■■■■■■■■■■■■■■■■■■■■■■■
// シーン設定のショートコード
// ■■■■■■■■■■■■■■■■■■■■■■■
function sceneSetting ($atts, $content = null) {
  extract(shortcode_atts( array(
    'stage' => 'unknown',
  ), $atts ));
  $content = do_shortcode (shortcode_unautop ($content));
  return '
  <div class="scene">
    <div id="scenebg_'.$stage.'" class="background"></div>
    <div class="wrap">
      '.$content.'
    </div>
  </div>';
  }
add_shortcode ('scene', 'sceneSetting');
// ■■■■■■■■■■■■■■■■■■■■■■■
// 検索フォームのショートコード
// ■■■■■■■■■■■■■■■■■■■■■■■
function wordSearch () {
  return '<form method="get" id="yojiSearch" action="'.home_url('/').'">
  <input type="text" name="s" id="yojiSearchInput" value="'.the_search_query().'" placeholder="カスタム投稿タイプ別検索" />
  <input type="hidden" name="post_type" value="yoji">
  <input type="submit" value="search" accesskey="f" />
</form>';
  }
  add_shortcode ('word_search', 'wordSearch');
// ■■■■■■■■■■■■■■■■■■■■■■■
// QUEST関連ショートコード
// ■■■■■■■■■■■■■■■■■■■■■■■
function questContent ($atts, $content = null) {
  extract(shortcode_atts( array(
    'num' => 0,
    'ans1' => '選択肢1',
    'ans2' => '選択肢2',
    'ans3' => '選択肢3',
    'ans4' => '選択肢4',
    'title' => '問題文',
    'correct' => '正解',
  ), $atts ));
  $content = do_shortcode (shortcode_unautop ($content));
  $ansarray = array($ans1, $ans2, $ans3, $ans4);
  shuffle($ansarray);
  return '
  <section id="block-quest-'.$num.'" class="block-quest">
  <h3>'.$title.'</h3>
  <div class="select-radio">
    <input class="quest-radio" type="radio" value="'.$ansarray[0].'" id="score_update_'.$num.'_'.$ansarray[0].'" name="score_update[select'.$num.']">
    <label for="score_update_'.$num.'_'.$ansarray[0].'">'.$ansarray[0].'</label>
  </div>
  <div class="select-radio">
    <input class="quest-radio" type="radio" value="'.$ansarray[1].'" id="score_update_'.$num.'_'.$ansarray[1].'" name="score_update[select'.$num.']">
    <label for="score_update_'.$num.'_'.$ansarray[1].'">'.$ansarray[1].'</label>
  </div>
  <div class="select-radio">
    <input class="quest-radio" type="radio" value="'.$ansarray[2].'" id="score_update_'.$num.'_'.$ansarray[2].'" name="score_update[select'.$num.']">
    <label for="score_update_'.$num.'_'.$ansarray[2].'">'.$ansarray[2].'</label>
  </div>
  <div class="select-radio">
    <input class="quest-radio" type="radio" value="'.$ansarray[3].'" id="score_update_'.$num.'_'.$ansarray[3].'" name="score_update[select'.$num.']">
    <label for="score_update_'.$num.'_'.$ansarray[3].'">'.$ansarray[3].'</label>
  </div>
  <div class="second-content">
    <h3>正解と解説</h3>
    <p class="correct-answer" data-correct="'.$correct.'">'.$correct.'</p>
    <div>'.$content.'</div>
  </div>
</section>
';
}
add_shortcode ('quest', 'questContent');