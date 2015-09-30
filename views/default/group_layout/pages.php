<?php
/**
 * Group pages
 */


$group = elgg_get_page_owner_entity();

echo elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'page_top',
	'container_guid' => elgg_get_page_owner_guid(),
	'limit' => 6,
	'full_view' => false,
	'pagination' => false,
	'no_results' => elgg_echo('pages:none'),
));
