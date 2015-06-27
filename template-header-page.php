<?php
/**
 * Template Name: Header Page
 */
?>
<?php get_template_part('templates/content', 'header'); ?>

<div class="wrap container" role="document">
  <div class="content row">
    <div class="col-md-offset-2 col-sm-8">
        <?php wp_reset_postdata(); the_content(); ?>
    </div>
  </div><!-- /.content -->
</div><!-- /.wrap -->
