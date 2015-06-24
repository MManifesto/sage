<?php
global $MMM_Roots;

$jumbotronCategory = 'jumbotron';
$jumbotronCount = 5;
?>

<section class="section-content section-jumbotron clearfix slider" id="section-jumbotron">
    <div id="home-jumobotron" class="carousel slide" data-ride="carousel">

<div class="carousel-inner" role="listbox">
<?php
$posts = get_posts( "category=" . $jumbotronCategory . "&numberposts=" . $jumbotronCount);

$i = 1;
$active = "active";

foreach ($posts as $jumbotron)
{
    if ($i++ != 1)
    {
        $active = "";
    }
	$image = $MMM_Roots->get_post_meta($jumbotron->ID, "image", true);
?>

<div class="durumslide item <?php echo $active; ?>" style="background-image: url('<?php echo $image; ?>')">
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