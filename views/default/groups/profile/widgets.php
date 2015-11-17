<?php
/**
 * Tabbed group profile layout
 */

$group = elgg_extract('entity', $vars);
$tab = get_input('tab');

$tool_options = elgg_get_config('group_tool_options');

sort($tool_options);

$enabled_tools = array();
foreach ($tool_options as $option) {
	$option_name = "{$option->name}_enable";

	if ($group->$option_name === 'yes') {
		$enabled_tools[] = $option->name;
	}
}

if ($tab === null) {
	$tab = $enabled_tools[0];
}

$tabs = array();
foreach ($enabled_tools as $tool) {
	$tabs[] = array(
		'text' => elgg_echo($tool),
		'href' => "groups/profile/{$group->guid}?tab={$tool}",
		'selected' => $tab == $tool ? true : false,
	);
}

$button = '';
if ($tab !== 'activity') {
	// The tool name and content type name are different for discussions
	$type = $tab == 'forum' ? 'discussion' : $tab;

	$button = elgg_view('output/url', array(
		'href' => "{$type}/add/{$group->guid}",
		'class' => 'elgg-button elgg-button-submit',
		'text' => elgg_echo("{$tab}:add"),
	));
}

$tabs = elgg_view('navigation/tabs', array('tabs' => $tabs));

$content = elgg_view("group_layout/{$tab}", $vars);

echo <<<HTML
<div class="group-profile-tabs tab-{$tab}">
	$button
	$tabs
	$content
</div>
HTML;
