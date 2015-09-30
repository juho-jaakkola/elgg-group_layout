<?php
/**
 * Groups latest activity
 */

$group = $vars['entity'];

$db_prefix = elgg_get_config('dbprefix');
echo elgg_list_river(array(
	'limit' => 10,
	'joins' => array(
		"JOIN {$db_prefix}entities e1 ON e1.guid = rv.object_guid",
		"LEFT JOIN {$db_prefix}entities e2 ON e2.guid = rv.target_guid",
	),
	'wheres' => array(
		"(e1.container_guid = $group->guid OR e2.container_guid = $group->guid)",
	),
	'no_results' => elgg_echo('groups:activity:none'),
));
