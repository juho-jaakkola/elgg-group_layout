<?php
/**
 * Latest forum posts in the group
 */

$group = $vars['entity'];

echo elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'groupforumtopic',
	'container_guid' => $group->getGUID(),
	'limit' => 6,
	'full_view' => false,
	'pagination' => false,
	'no_results' => elgg_echo('discussion:none'),
));
