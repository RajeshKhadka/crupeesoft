<?php
// hook into the init action and call create_members_taxonomies when it fires
add_action('init', 'create_our_work_taxonomies', 0);

// create two taxonomies, genres and writers for the post type "book"
function create_our_work_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)

	$labels = array(
		'name' => _x('Work Showcase', 'taxonomy general name'),
		'singular_name' => _x('Work Showcase', 'taxonomy singular name'),
		'search_items' => __('Search Work Showcase Category'),
		'all_items' => __('All Work Showcase Category'),
		'parent_item' => __('Parent Work Showcase Category'),
		'parent_item_colon' => __('Parent Work Showcase Category:'),
		'edit_item' => __('Edit Work Showcase Category'),
		'update_item' => __('Update Work Showcase Category'),
		'add_new_item' => __('Add New Work Showcase Category'),
		'new_item_name' => __('New Work Showcase Category Name'),
		'menu_name' => __('Work Showcase Category'),
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		// 'rewrite' => array('slug' => 'product'),
	);

	register_taxonomy('workshowcase_cat', array('works'), $args);

	// $labels = array(
	// 	'name' => _x('Slider', 'taxonomy general name'),
	// 	'singular_name' => _x('Slider', 'taxonomy singular name'),
	// 	'search_items' => __('Search Slider Category'),
	// 	'all_items' => __('All Slider Category'),
	// 	'parent_item' => __('Parent Slider Category'),
	// 	'parent_item_colon' => __('Parent Slider Category:'),
	// 	'edit_item' => __('Edit Slider Category'),
	// 	'update_item' => __('Update Slider Category'),
	// 	'add_new_item' => __('Add New Slider Category'),
	// 	'new_item_name' => __('New Slider Category Name'),
	// 	'menu_name' => __('Slider Category'),
	// );

	// $args = array(
	// 	'hierarchical' => true,
	// 	'labels' => $labels,
	// 	'show_ui' => true,
	// 	'show_admin_column' => true,
	// 	'query_var' => true,
	// 	// 'rewrite' => array('slug' => 'product'),
	// );

	// register_taxonomy('sliders', array('destinations', 'treks'), $args);
}