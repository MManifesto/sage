<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/styles/main.css
 *
 * Enqueue scripts in the following order:
<<<<<<< HEAD
 * 1. Latest jQuery via Google CDN (if enabled in config.php)
 * 2. /theme/assets/scripts/modernizr.js
 * 3. /theme/assets/scripts/main.js
 *
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
=======
 * 1. /theme/dist/scripts/modernizr.js
 * 2. /theme/dist/scripts/main.js
>>>>>>> upstream/master
 */

class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
<<<<<<< HEAD
  $dist_path = get_template_directory_uri() . '/assets/';
=======
  $dist_path = get_template_directory_uri() . DIST_DIR;
>>>>>>> upstream/master
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
<<<<<<< HEAD
    $manifest_path = get_template_directory() . '/assets/assets.json';
=======
    $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
>>>>>>> upstream/master
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

function assets() {
  wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
  wp_enqueue_script('sage_js', asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
<<<<<<< HEAD

// http://wordpress.stackexchange.com/a/12450
function jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/scripts/jquery.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', __NAMESPACE__ . '\\jquery_local_fallback');

/**
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */
function google_analytics() {
  ?>
  <script>
    <?php if (WP_ENV === 'production' && !current_user_can('manage_options')) : ?>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    <?php else : ?>
      function ga() {
        if (window.console) {
          console.log('Google Analytics: ' + [].slice.call(arguments));
        }
      }
    <?php endif; ?>
    ga('create','<?= GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
  </script>
  <?php
}

if (GOOGLE_ANALYTICS_ID) {
  add_action('wp_footer', __NAMESPACE__ . '\\google_analytics', 20);
}

=======
>>>>>>> upstream/master
