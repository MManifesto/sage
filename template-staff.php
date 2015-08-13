<?php
/**
 * Template Name: Staff Page
 */
global $MMM_Roots;

get_template_part('templates/content', 'header');

$team = get_posts( "post_type=staff" . "&numberposts=" . -1 . "&order=ASC");

function display_group($posts, $display_type=1)
{
    global $MMM_Roots;
    $output = "";
    $post_template = '<a href="javascript: void(0)" id="staff-image-%s" class="col-sm-2 staff-member" style="background-image: url(\'%s\');" title="%s"></a>';

    foreach ($posts as $post) 
    {
        $type = $MMM_Roots->get_post_meta($post->ID, "staff-type", true);
        if ($type == $display_type)
        {
            $image = $MMM_Roots->get_post_meta($post->ID, "image", true);
            $output .= sprintf($post_template, $post->ID, $image, $post->post_title);
        }
    }

    return $output;
}

function hidden_details($posts)
{
    global $MMM_Roots;
    $output = "";
    $css_hooks = "";
    $post_template = '<div id="staff-details-%s" class="staff-details"><h4>%s</h4>%s</div>';
    $css_hook_template = '#staff-image-%1$s:hover ~ .row .staff-details-wrapper #staff-details-%1$s, #staff-image-%1$s:active ~ .row .staff-details-wrapper #staff-details-%1$s, #staff-image-%1$s:hover ~ .row .staff-details-wrapper #staff-details-%1$s, #staff-image-%1$s:focus ~ .row .staff-details-wrapper #staff-details-%1$s {visibility: visible; opacity: 1; transition-delay:0s;}';

    foreach ($posts as $post) 
    {
        $output .= sprintf($post_template, $post->ID, $post->post_title, $post->post_content);
        $css_hooks .= sprintf($css_hook_template, $post->ID);
    }

    return $output . sprintf('<style type="text/css">%s</style>', $css_hooks);
}

?>

<section class="section-content section-header clearfix staff-wrapper">

<div class="staff-listing">
    <div class="container">
        <div class="row">
            <div class="staff-list col-sm-10 col-sm-offset-1">
                <h4>Directors</h4>
                <?php echo display_group($team, 1); ?>
                <h4>The Durum Team</h4>
                <?php echo display_group($team, 2); ?>
                <div class="row">
                    <div class="staff-details-wrapper col-sm-9">
                        <?php echo hidden_details($team); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
