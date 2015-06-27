<?php
global $MMM_Roots;

$post_id = get_the_ID();
$post = get_post($post_id);
$tagline = $MMM_Roots->get_post_meta($post->ID, "tagline", true);
$image = $MMM_Roots->get_post_meta($post->ID, "image", true);
$template = $MMM_Roots->get_post_meta($post->ID, "header-template", true);
$height = $MMM_Roots->get_post_meta($post->ID, "section-height", true);
$margin = $MMM_Roots->get_post_meta($post->ID, "body-margin", true);

$wrapperClass = "";
$slideClass = "";
$customHeight = "";
$customMargin = "";

if ($template != 1)
{
    $wrapperClass = " header-narrow";
    $slideClass = " container";
}

if ($height != "")
{
    $customHeight = sprintf('height: %s;', $height);
}

if ($margin != "")
{
    $customMargin = sprintf('style="margin-top: %s;"', $margin);
}

?>

<section id="section-header" class="section-content section-header clearfix slider<?php echo $wrapperClass; ?>">

<div class="header-slide<?php echo $slideClass; ?>" style="background-image: url('<?php echo $image; ?>');<?php echo $customHeight; ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 slide-body"<?php echo $customMargin; ?>>
                <div class="slide-heading">
                    <?php echo $tagline ?>
                </div>
            </div>
        </div>
    </div>
</div>      


</section>