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
function create_block_wp_multi_block_block_init()
{
	register_block_type(__DIR__ . '/build/blocks/block-one');
	register_block_type(__DIR__ . '/build/blocks/block-two');
}
add_action('init', 'create_block_wp_multi_block_block_init');
