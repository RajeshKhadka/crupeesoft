<?php
/**
Template Name: AboutUs Layout
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

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
	'post_type' => 'reviews',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	// 'orderby' => 'meta_value_num',
	// 'meta_key' => 'works_priority',
	'order' => 'ASC',

);
$context['reviews'] = Timber::get_posts($args);

$pages = get_pages(array(
	'meta_key' => '_wp_page_template',
	'meta_value' => 'front-page.php',
));
$context['homepage_content'] = new Timber\Post($pages[0]->ID);

Timber::render(array('page-about.twig', 'page.twig'), $context);
