<?php
/**
 * Group file tab
 */

$group = elgg_extract('entity', $vars);

$content = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'file',
	'container_guid' => $group->guid,
	'full_view' => false,
	'pagination' => true,
	'no_results' => elgg_echo('file:none'),
	'distinct' => false,
));

$new_link = elgg_view('output/url', array(
	'href' => "file/add/$group->guid",
	'text' => elgg_echo('file:add'),
	'is_trusted' => true,
));

echo $content;