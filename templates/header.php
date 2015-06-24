<?php use Roots\Sage\Nav;


global $MMM_Roots;
$brand_logo = $MMM_Roots->get_setting("brand_logo");
?>

<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="row-fluid">
      <div class="col-sm-12 brand-wrapper">
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img class="brand-logo" src="<?php echo $brand_logo; ?>" title="<?php bloginfo('name'); ?>" /></a>
      </div>
    </div>
  </div>
  <div class="container nav-wrapper">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new Nav\SageNavWalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
