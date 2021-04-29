<?php
/**
 * Template Name: Blog Page Template
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$context['blogList'] = new Timber\PostQuery();
Timber::render( array( 'page-blog.twig', 'page.twig' ), $context );
