<?php
/**
Template Name: Homepage Layout
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render(array('home.twig', 'page.twig'), $context);
