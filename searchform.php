<form method="get" id="yojiSearch" action="<?php echo home_url('/'); ?>">
  <input required type="text" name="s" id="yojiSearchInput" value="<?php the_search_query(); ?>" placeholder="カスタム投稿タイプ別検索"/>
  <input type="hidden" name="post_type" value="yoji">
  <input type="submit" value="search" accesskey="f" />
</form>