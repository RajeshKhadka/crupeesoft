<?php
/**
Template Name: Homepage Layout
  */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$workshowcase_category = get_terms('workshowcase_cat');
$context['workshowcase_category'] = $workshowcase_category;

$works = array();
foreach ($workshowcase_category as $key => $value) {
	$args = array(
		'post_type' => 'works',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		// 'orderby' => 'meta_value_num',
		// 'meta_key' => 'works_priority',
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => 'workshowcase_cat',
				'field' => ' term_id',
				'terms' => $value->term_id,
			),
		),
	);
	$works[$value->slug] = Timber::get_posts($args);
}
$context['workshowcase'] = $works;

$args = array(
	'post_type' => 'sliders',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	// 'orderby' => 'meta_value_num',
	// 'meta_key' => 'works_priority',
	'order' => 'DESC',

);
$context['sliders'] = Timber::get_posts($args);
$args = array(
	'post_type' => 'features',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	// 'orderby' => 'meta_value_num',
	// 'meta_key' => 'works_priority',
	'order' => 'DESC',

);
$context['features'] = Timber::get_posts($args);

$args = array(
	'post_type' => 'teams',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	// 'orderby' => 'meta_value_num',
	// 'meta_key' => 'works_priority',
	'order' => 'ASC',

);
$context['teams'] = Timber::get_posts($args);

$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 6,
	// 'orderby' => 'meta_value_num',
	// 'meta_key' => 'works_priority',
	'order' => 'DESC',

);
$context['latest_news'] = Timber::get_posts($args);

// echo "<pre>";
// print_r($context['offer_section']);
// print_r($context['post']);
// die;
Timber::render(array('home.twig', 'page.twig'), $context);
