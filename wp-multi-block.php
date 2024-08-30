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
