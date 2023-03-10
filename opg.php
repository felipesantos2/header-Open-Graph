<?php

/**
 * Plugin Name: OPG
 * Description: Add header open graph 
 * Version: 1.0.0
 * Requires PHP: 7.4
 * Author: Felipe Pinheiro
 * Author URI: https://github.com/felipesantos2  
 * Text Domain: OPG
 */

// Avoid to load this file directly
if (isset($_SERVER['SCRIPT_FILENAME']) and basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) exit();

class Open_Graph
{
    function  __construct() {
        add_action('wp_head', array($this, 'add_header_open_graph'), PHP_INT_MAX);
        add_action('language_attributes', array($this, 'opengraph_xml'), PHP_INT_MAX);
    }



    function add_header_open_graph() {

?>
        <!-- HTML Meta Tags -->
        <meta name="description" content="<?php echo bloginfo('description') ?>">

        <!-- Facebook Meta Tags -->
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
        <meta property="og:title" content="<?php bloginfo('name'); ?>">
        <meta property="og:description" content="<?php echo the_title(); ?>">
        <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())); ?>">
        <meta property="og:type" content="Website">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300">
        <meta property="og:image:alt" content="<?php echo get_the_title(get_the_ID()); ?>">
        <meta property="og:url" content="<?php the_permalink(); ?>">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="<?php echo get_site_url(); ?>">
        <meta property="twitter:url" content="<?php the_permalink(); ?> ">
        <meta name="twitter:title" content="<?php bloginfo('name'); ?>">
        <meta name="twitter:description" content="<?php the_title(); ?>">
        <meta name="twitter:image" content="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())); ?>">
        <!-- Meta Tags Generated via https://www.opengraph.xyz -->


<?php

    }

    function opengraph_xml() {
        return 'xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }

}

$open_graph = new Open_Graph();

?>