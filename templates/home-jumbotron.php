<?php
global $MMM_Roots;

$jumbotronCategory = 'Jumbotron';
$jumbotronCount = 5;

$mobile = is_on_mobile();

?>

<section class="section-content section-jumbotron clearfix slider" id="section-jumbotron">
    <div id="home-jumobotron" class="carousel slide carousel-fade" data-ride="carousel">

<div class="carousel-inner" role="listbox">
<?php
$posts = get_posts( "category_name=" . $jumbotronCategory . "&numberposts=" . $jumbotronCount);

$i = 1;
$active = "active";

foreach ($posts as $jumbotron)
{
    if ($i++ != 1)
    {
        $active = "";
    }
	$image = $MMM_Roots->get_post_meta($jumbotron->ID, "image", true);

    if ($mobile)
    {
        $mobileImage = $MMM_Roots->get_post_meta($jumbotron->ID, "mobile-image", true);
        if ($mobileImage != "")
        {
            $image = $mobileImage;
        }
    }

    $position = $MMM_Roots->get_post_meta($jumbotron->ID, "background-position", true);

    $customPosition = "";
    $customPositionTemplate = " background-position: %s;";

    if ($position != "")
    {
        $customPosition = sprintf($customPositionTemplate, $position);
    }
?>

<div class="carousel-slide item <?php echo $active; ?>" style="background-image: url('<?php echo $image; ?>');<?php echo $customPosition; ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 slide-body">
                <div class="slide-control control-left">
                    <a href="#home-jumobotron" role="button" data-slide="prev"><i class="fa fa-5x fa-caret-left"></i></a>            
                </div>
                <div class="slide-control control-right">
                    <a href="#home-jumobotron" role="button" data-slide="next"><i class="fa fa-5x fa-caret-right"></i></a>
                </div>

                <div class="slide-heading">
                    [ <?php echo $jumbotron->post_title; ?> ]
                </div>
            </div>
        </div>
    </div>
</div>      

<?php
} 
?>

</div>
    </div>
</section>