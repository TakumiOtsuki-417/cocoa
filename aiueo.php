<ul>
<?php
$categories = get_categories();
foreach ($categories as $category) {
    $cat_id = $category->term_id;
    $cat_url = esc_url(get_category_link($category->term_id));
    echo '<li class="cat-'.$cat_id.'"><a href="'.$cat_url.'">' . $category->name . '</a></li>';
}
?>
</ul>