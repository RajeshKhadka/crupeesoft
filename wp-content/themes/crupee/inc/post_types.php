<?php

add_action('init', 'post_type_init');
/**
 * Register a video post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function post_type_init() {

	$labels = array(
		'name' => _x('Work ', 'post type general name', 'crupeesoft'),
		'singular_name' => _x('Work ', 'post type singular name', 'crupeesoft'),
		'menu_name' => _x('Work ', 'admin menu', 'crupeesoft'),
		'name_admin_bar' => _x('Work ', 'add new on admin bar', 'crupeesoft'),
		'add_new' => _x('Add New', 'Work ', 'crupeesoft'),
		'add_new_item' => __('Add New Work ', 'crupeesoft'),
		'new_item' => __('New Work ', 'crupeesoft'),
		'edit_item' => __('Edit Work ', 'crupeesoft'),
		'view_item' => __('View Work ', 'crupeesoft'),
		'all_items' => __('All Work', 'crupeesoft'),
		'search_items' => __('Search Works', 'crupeesoft'),
		'parent_item_colon' => __('Parent Works:', 'crupeesoft'),
		'not_found' => __('No Work found.', 'crupeesoft'),
		'not_found_in_trash' => __('No Works found in Trash.', 'crupeesoft'),
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Description.', 'crupeesoft'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-images-alt2',
		'query_var' => true,
		// 'rewrite'            => array( 'slug' => 'crupeesoft' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('works', $args);

	$labels = array(
		'name' => _x('Review ', 'post type general name', 'crupeesoft'),
		'singular_name' => _x('Review ', 'post type singular name', 'crupeesoft'),
		'menu_name' => _x('Review ', 'admin menu', 'crupeesoft'),
		'name_admin_bar' => _x('Review ', 'add new on admin bar', 'crupeesoft'),
		'add_new' => _x('Add New', 'Review ', 'crupeesoft'),
		'add_new_item' => __('Add New Review ', 'crupeesoft'),
		'new_item' => __('New Review ', 'crupeesoft'),
		'edit_item' => __('Edit Review ', 'crupeesoft'),
		'view_item' => __('View Review ', 'crupeesoft'),
		'all_items' => __('All Review', 'crupeesoft'),
		'search_items' => __('Search Reviews', 'crupeesoft'),
		'parent_item_colon' => __('Parent Reviews:', 'crupeesoft'),
		'not_found' => __('No Review found.', 'crupeesoft'),
		'not_found_in_trash' => __('No Reviews found in Trash.', 'crupeesoft'),
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Description.', 'crupeesoft'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-networking',
		'query_var' => true,
		// 'rewrite'            => array( 'slug' => 'crupeesoft' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('reviews', $args);

	$labels = array(
		'name' => _x('Feature ', 'post type general name', 'crupeesoft'),
		'singular_name' => _x('Feature ', 'post type singular name', 'crupeesoft'),
		'menu_name' => _x('Feature ', 'admin menu', 'crupeesoft'),
		'name_admin_bar' => _x('Feature ', 'add new on admin bar', 'crupeesoft'),
		'add_new' => _x('Add New', 'Feature ', 'crupeesoft'),
		'add_new_item' => __('Add New Feature ', 'crupeesoft'),
		'new_item' => __('New Feature ', 'crupeesoft'),
		'edit_item' => __('Edit Feature ', 'crupeesoft'),
		'view_item' => __('View Feature ', 'crupeesoft'),
		'all_items' => __('All Feature', 'crupeesoft'),
		'search_items' => __('Search Features', 'crupeesoft'),
		'parent_item_colon' => __('Parent Features:', 'crupeesoft'),
		'not_found' => __('No Feature found.', 'crupeesoft'),
		'not_found_in_trash' => __('No Features found in Trash.', 'crupeesoft'),
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Description.', 'crupeesoft'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-networking',
		'query_var' => true,
		// 'rewrite'            => array( 'slug' => 'crupeesoft' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('features', $args);

	$labels = array(
		'name' => _x('Career ', 'post type general name', 'crupeesoft'),
		'singular_name' => _x('Career ', 'post type singular name', 'crupeesoft'),
		'menu_name' => _x('Career ', 'admin menu', 'crupeesoft'),
		'name_admin_bar' => _x('Career ', 'add new on admin bar', 'crupeesoft'),
		'add_new' => _x('Add New', 'Career ', 'crupeesoft'),
		'add_new_item' => __('Add New Career ', 'crupeesoft'),
		'new_item' => __('New Career ', 'crupeesoft'),
		'edit_item' => __('Edit Career ', 'crupeesoft'),
		'view_item' => __('View Career ', 'crupeesoft'),
		'all_items' => __('All Career', 'crupeesoft'),
		'search_items' => __('Search Careers', 'crupeesoft'),
		'parent_item_colon' => __('Parent Careers:', 'crupeesoft'),
		'not_found' => __('No Career found.', 'crupeesoft'),
		'not_found_in_trash' => __('No Careers found in Trash.', 'crupeesoft'),
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Description.', 'crupeesoft'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-networking',
		'query_var' => true,
		// 'rewrite'            => array( 'slug' => 'crupeesoft' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('careers', $args);

	$labels = array(
		'name' => _x('Team ', 'post type general name', 'crupeesoft'),
		'singular_name' => _x('Team ', 'post type singular name', 'crupeesoft'),
		'menu_name' => _x('Team ', 'admin menu', 'crupeesoft'),
		'name_admin_bar' => _x('Team ', 'add new on admin bar', 'crupeesoft'),
		'add_new' => _x('Add New', 'Team ', 'crupeesoft'),
		'add_new_item' => __('Add New Team ', 'crupeesoft'),
		'new_item' => __('New Team ', 'crupeesoft'),
		'edit_item' => __('Edit Team ', 'crupeesoft'),
		'view_item' => __('View Team ', 'crupeesoft'),
		'all_items' => __('All Team', 'crupeesoft'),
		'search_items' => __('Search Teams', 'crupeesoft'),
		'parent_item_colon' => __('Parent Teams:', 'crupeesoft'),
		'not_found' => __('No Team found.', 'crupeesoft'),
		'not_found_in_trash' => __('No Teams found in Trash.', 'crupeesoft'),
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Description.', 'crupeesoft'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-networking',
		'query_var' => true,
		// 'rewrite'            => array( 'slug' => 'crupeesoft' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('teams', $args);

	$labels = array(
		'name' => _x('Slider ', 'post type general name', 'crupeesoft'),
		'singular_name' => _x('Slider ', 'post type singular name', 'crupeesoft'),
		'menu_name' => _x('Slider ', 'admin menu', 'crupeesoft'),
		'name_admin_bar' => _x('Slider ', 'add new on admin bar', 'crupeesoft'),
		'add_new' => _x('Add New', 'Slider ', 'crupeesoft'),
		'add_new_item' => __('Add New Slider ', 'crupeesoft'),
		'new_item' => __('New Slider ', 'crupeesoft'),
		'edit_item' => __('Edit Slider ', 'crupeesoft'),
		'view_item' => __('View Slider ', 'crupeesoft'),
		'all_items' => __('All Slider', 'crupeesoft'),
		'search_items' => __('Search Sliders', 'crupeesoft'),
		'parent_item_colon' => __('Parent Sliders:', 'crupeesoft'),
		'not_found' => __('No Slider found.', 'crupeesoft'),
		'not_found_in_trash' => __('No Sliders found in Trash.', 'crupeesoft'),
	);

	$args = array(
		'labels' => $labels,
		'description' => __('Description.', 'crupeesoft'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-networking',
		'query_var' => true,
		// 'rewrite'            => array( 'slug' => 'crupeesoft' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('sliders', $args);

}