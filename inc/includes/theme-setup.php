<?php
/**
 * Theme setup
 *
 * @Author: Niku Hietanen
 * @Date: 2020-02-20 13:46:50
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2021-05-04 11:13:01
 *
 * @package ak-starter
 **/

namespace Air_Light;

function theme_setup() {

  /**
   * Register menu locations
   */

  register_nav_menus( THEME_SETTINGS['menu_locations'] );

  /**
   * Load textdomain.
   */
  load_theme_textdomain( THEME_SETTINGS['textdomain'], get_template_directory() . '/languages' );

  /**
   * Define content width in articles
   */
  if ( ! isset( $content_width ) ) {
    $content_width = THEME_SETTINGS['content_width'];
  }

  // Run the rest of the setup
  build_taxonomies();
  build_post_types();
}

/**
 * Build taxonomies
 */
function build_taxonomies() {
  if ( ! is_array( THEME_SETTINGS['taxonomies'] ) || ! THEME_SETTINGS['taxonomies'] ) {
    return;
  }

  foreach ( THEME_SETTINGS['taxonomies'] as $slug => $args ) {
    $classname = __NAMESPACE__ . '\\' . $args['name'];
    $file_path = get_theme_file_path( '/inc/taxonomies/' . $slug . '.php' );

    if ( ! file_exists( $file_path ) ) {
      return new \WP_Error( 'invalid-taxonomy', __( 'The taxonomy class file does not exist.', 'ak-starter' ), $classname );
    }
    require $file_path;

    if ( ! class_exists( $classname ) ) {
      return new \WP_Error( 'invalid-taxonomy', __( 'The taxonomy you attempting to create does not have a class to instance. Possible problems: your configuration does not match the class file name; the class file name does not exist.', 'ak-starter' ), $classname );
    }

    $taxonomy_class = new $classname( $slug );
    $taxonomy_class->register( $args['post_types'] );
  }
}

/**
 * Build custom post types
 */
function build_post_types() {
  if ( ! is_array( THEME_SETTINGS['post_types'] ) || ! THEME_SETTINGS['post_types'] ) {
    return;
  }

  foreach ( THEME_SETTINGS['post_types'] as $slug => $name ) {
    $classname = __NAMESPACE__ . '\\' . $name;
    $file_path = get_theme_file_path( '/inc/post-types/' . $slug . '.php' );

    if ( ! file_exists( $file_path ) ) {
      return new \WP_Error( 'invalid-taxonomy', __( 'The taxonomy class file does not exist.', 'ak-starter' ), $classname );
    }
    // Get the class file
    require $file_path;

    if ( ! class_exists( $classname ) ) {
      return new \WP_Error( 'invalid-taxonomy', __( 'The taxonomy you attempting to create does not have a class to instance. Possible problems: your configuration does not match the class file name; the class file name does not exist.', 'ak-starter' ), $classname );
    }

    $post_type_class = new $classname( $slug );
    $post_type_class->register();
  }
}

/**
 * Build theme support
 */
function build_theme_support() {
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'align-wide' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support(
    'html5',
    [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style',
    ]
  );
}
