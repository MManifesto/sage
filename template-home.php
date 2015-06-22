<?php
/**
 * Template Name: Home
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/home', 'slider'); ?>


<div class="wrap container" role="document">
  <div class="content row">
    <main class="main" role="main">
        <?php the_content(); ?>
    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->

<?php endwhile; ?>
