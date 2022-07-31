<?php
/**
 * @Author: Niku Hietanen
 * @Date: 2020-02-18 15:05:35
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2021-05-04 11:13:17
 *
 * @package ak-starter
 */

namespace Air_Light;

/**
 * Registers the Your Taxonomy taxonomy.
 *
 * @param Array $post_types Optional. Post types in
 * which the taxonomy should be registered.
 */
class Your_Taxonomy extends Taxonomy {


  public function register( array $post_types = [] ) {
    // Taxonomy labels.
    $labels = [
      'name'                  => _x( 'Your Taxonomies', 'Taxonomy plural name', 'ak-starter' ),
      'singular_name'         => _x( 'Your Taxonomy', 'Taxonomy singular name', 'ak-starter' ),
      'search_items'          => __( 'Search Your Taxonomies', 'ak-starter' ),
      'popular_items'         => __( 'Popular Your Taxonomies', 'ak-starter' ),
      'all_items'             => __( 'All Your Taxonomies', 'ak-starter' ),
      'parent_item'           => __( 'Parent Your Taxonomy', 'ak-starter' ),
      'parent_item_colon'     => __( 'Parent Your Taxonomy', 'ak-starter' ),
      'edit_item'             => __( 'Edit Your Taxonomy', 'ak-starter' ),
      'update_item'           => __( 'Update Your Taxonomy', 'ak-starter' ),
      'add_new_item'          => __( 'Add New Your Taxonomy', 'ak-starter' ),
      'new_item_name'         => __( 'New Your Taxonomy', 'ak-starter' ),
      'add_or_remove_items'   => __( 'Add or remove Your Taxonomies', 'ak-starter' ),
      'choose_from_most_used' => __( 'Choose from most used Taxonomies', 'ak-starter' ),
      'menu_name'             => __( 'Your Taxonomy', 'ak-starter' ),
    ];

    $args = [
      'labels'            => $labels,
      'public'            => false,
      'show_in_nav_menus' => true,
      'show_admin_column' => true,
      'hierarchical'      => true,
      'show_tagcloud'     => false,
      'show_ui'           => true,
      'query_var'         => false,
      'rewrite'           => [
        'slug' => 'your-taxonomy',
      ],
    ];

    $this->register_wp_taxonomy( $this->slug, $post_types, $args );
  }

}
