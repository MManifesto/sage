<?php
/**
 * Template Name: Home
 */
?>
<?php get_template_part('templates/home', 'jumbotron'); ?>

<div class="wrap container" role="document">
  <div class="content row">
    <main class="main" role="main">
        <?php wp_reset_postdata(); the_content(); ?>
    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->
