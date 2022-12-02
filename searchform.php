<form method="get" id="yojiSearch" action="<?php echo home_url('/'); ?>">
  <input required type="text" name="s" id="yojiSearchInput" value="<?php the_search_query(); ?>" placeholder="キーワードを入力"/>
  <input type="hidden" name="post_type" value="yoji">
  <input type="submit" value="けんさく！" accesskey="f" />
</form>