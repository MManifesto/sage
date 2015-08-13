<?php
/**
 * Template Name: Properties
 */

global $MMM_Roots;

$propertyCategory = 'Property';
$propertyCount = 20;
$properties = get_posts( "post_type=property" . "&numberposts=" . $propertyCount);

?>

<section class="section-content section-header clearfix property-wrapper">

<div class="property-listing">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row">
                <?php
                $i = 0;
                foreach ($properties as $property) 
                {
                    $cssClass = ($i++ % 2 == 0)?"property-left":"property-right";

                    $title = $property->post_title;
                    $image = $MMM_Roots->get_post_meta($property->ID, "image", true);
                    $propertylink = $MMM_Roots->get_post_meta($property->ID, "property-link", true);
                    $link = "javascript: void(0);";

                    if ($propertylink != "")
                    {
                        $link = $propertylink;
                    }

                    ?>
                    <a href="<?php echo $link; ?>" class="col-sm-6 property" style="background-image: url('<?php echo $image; ?>')">
                        <div class="property-container">
                            <div class="property-details <?php echo $cssClass; ?>">
                                <h4><?php echo $title; ?></h4>
                                <?php echo $property->post_content; ?>
                            </div>
                        </div>
                    </a>
                    <?php
                } ?>
                </div>
            </div>
        </div>
    </div>
</div>      


</section>