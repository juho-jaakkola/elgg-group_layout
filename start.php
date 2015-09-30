<?php
/**
 * Group layout
 */

elgg_register_event_handler('init', 'system', 'group_layout_init');

/**
 * Initialize the plugin
 */
function group_layout_init () {
	elgg_extend_view('css/elgg', 'css/group_layout');
}
