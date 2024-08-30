<?php

/**
 * Plugin Name:       WP Multi Block
 * Description:       Example plugin for creating multiple blocks in a single plugin.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-multi-block
 *
 * @package CreateBlock
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Registers static blocks using the metadata loaded from the `block.json` file.
 */
function multiblock_register_blocks()
{
	$custom_blocks = [
		'block-one',
		'block-two',
		'block-three',
		'block-four',
	];

	foreach ($custom_blocks as $block) {
		register_block_type(__DIR__ . '/build/blocks/' . $block);
	}
}
add_action('init', 'multiblock_register_blocks');

/**
 * Enqueues the block's assets for the editor.
 */
function multiblock_enqueue_block_assets()
{
	wp_enqueue_script(
		'multi-block-editor-js',
		plugin_dir_url(__FILE__) . 'build/multi-block-editor.js',
		['wp-blocks', 'wp-components', 'wp-data', 'wp-dom-ready', 'wp-edit-post', 'wp-element', 'wp-i18n', 'wp-plugins'],
		null,
		false
	);

	wp_enqueue_style(
		'multi-block-editor-css',
		plugin_dir_url(__FILE__) . 'build/multi-block-editor.css',
		[],
		null
	);
}
add_action('enqueue_block_editor_assets', 'multiblock_enqueue_block_assets');

/**
 * Enqueues the frontend assets for the blocks.
 */
function multiblock_enqueue_frontend_assets()
{
	wp_enqueue_style('multi-block-frontend-js', plugin_dir_url(__FILE__) . 'build/style-multi-block-editor.css',);
	wp_enqueue_script('multi-block-frontend-css', plugin_dir_url(__FILE__) . 'build/multi-block-frontend.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'multiblock_enqueue_frontend_assets');
