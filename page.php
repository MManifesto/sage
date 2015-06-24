<?php while (have_posts()) : the_post(); ?>

<div class="wrap container" role="document">
  <div class="content row">
    <main class="main" role="main">
      <?php get_template_part('templates/page', 'header'); ?>
      <?php get_template_part('templates/content', 'page'); ?>
    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->

<?php endwhile; ?>