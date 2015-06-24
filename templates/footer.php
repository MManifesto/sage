<?php


global $MMM_Roots;
$brand_logo = $MMM_Roots->get_setting("footer_logo");

?>

<footer class="content-info" role="contentinfo">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-sm-2">
            <a class="navbar-brand img-responsive" href="<?= esc_url(home_url('/')); ?>">
                <img class="brand-logo" src="<?php echo $brand_logo; ?>" title="<?php bloginfo('name'); ?>" />
            </a>
        </div>
        <div class="col-sm-2">
          <div class="contact-info email"><i class="fa fa-comment-o"></i> <a href="#">info@durum.ca</a></div>
          <div class="contact-info phone"><i class="fa fa-phone"></i> <a href="#">403.541.5303</a></div>
        </div>
        <div class="col-sm-2">
          <div class="contact-info address">
            <i class="fa fa-map-marker column"></i>
            <a href="#">
              500 1414 8th Street SW<br />
              Calgary, Alberta T2R 1J^
            </a>
          </div>
        </div>
      </div>
  </div>
</footer>
