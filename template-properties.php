<?php
/**
 * Template Name: Properties
 */

global $MMM_Roots;

$propertyCategory = 'Property';
$propertyCount = 5;
$properties = get_posts( "category_name=" . $propertyCategory . "&numberposts=" . $propertyCount);

$properties = array_merge($properties, $properties);

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
                    ?>
                    <div class="col-sm-6 property" style="background-image: url('<?php echo $image; ?>')">
                        <div class="property-container">
                            <div class="property-details <?php echo $cssClass; ?>">
                                <h4><?php echo $title; ?></h4>
                                <?php $property->post_content; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                } ?>
                </div>
            </div>
        </div>
    </div>
</div>      


</section>