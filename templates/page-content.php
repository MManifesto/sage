<?php

global $MMM_Roots;
$post_id = get_the_ID();
$post = get_post($post_id);

$width = $MMM_Roots->get_post_meta($post->ID, "content-width", true);
$contentWidth = "col-md-offset-2 col-sm-8";

switch ($width)
{
    case 1:
        $contentWidth = "col-md-offset-3 col-sm-6";
    break;
    case 3:
        $contentWidth = "col-sm-12";
    break;
}

?>


<div class="wrap container" role="document">
  <div class="content row">
    <div class="<?php echo $contentWidth; ?>">
        <?php wp_reset_postdata(); the_content(); ?>
    </div>
  </div><!-- /.content -->
</div><!-- /.wrap -->