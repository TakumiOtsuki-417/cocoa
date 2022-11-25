<!DOCTYPE html>
<html lang="Ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
    <script src="https://kit.fontawesome.com/d79adcd29b.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <div class="inner">
        <a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/cocoalogo.png" alt=""></a>
        <?php get_template_part('nav'); ?>
      </div>
    </header>
      <?php if(!(is_front_page() || is_page('about'))){
        get_template_part("breadcrumb");
      }
       ?>
