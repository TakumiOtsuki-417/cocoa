<div class="globalnav">
  <input type="checkbox" id="drawer-checkbox" class="menu-checkbox">
  <label for="drawer-checkbox" class="drawer-icon"><span></span></label>
  <div class="drawer-menu">
    <ul class="drawer-menu-list">
    <?php wp_nav_menu(
      array (
        //カスタムメニュー名
        'theme_location' => 'global-navi',
        //コンテナを表示しない
        'container' => false,
        //カスタムメニューを設定しない際に固定ページでメニューを作成しない
        'fallback_cb' => false,
        //出力されるulに対してidやclassを表示しない
        'items_wrap' => '<ul class="drawer-menu-list">%3$s</ul>',
      )
    ); ?>
    </ul>
  </div>
  <label for="drawer-checkbox" class="menu-background"></label>
</div>
