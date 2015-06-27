<?php


global $MMM_Roots;
$brand_logo = $MMM_Roots->get_setting("footer_logo");
$email = $MMM_Roots->get_setting("email");
$phone = $MMM_Roots->get_setting("phone");
$address = $MMM_Roots->get_setting("address");

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
        <div class="col-sm-3">
          <div class="contact-info email"><i class="fa fa-comment-o"></i> <a href="mailto: <?php echo $email; ?>"><?php echo $email; ?></a></div>
          <div class="contact-info phone"><i class="fa fa-phone"></i> <?php echo $phone; ?></div>
        </div>
        <div class="col-sm-3">
          <div class="contact-info address">
            <i class="fa fa-map-marker column"></i>
            <?php echo $address; ?>            
          </div>
        </div>
      </div>
  </div>
</footer>
