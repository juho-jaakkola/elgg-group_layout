<?php
/**
 * Tabbed group profile layout
 */

$group = elgg_extract('entity', $vars);
$tab = get_input('tab', 'activity');

$tool_options = elgg_get_config('group_tool_options');

sort($tool_options);

$tabs = array();

$tools = array();
foreach ($tool_options as $option) {
	$option_name = "{$option->name}_enable";

	if (isset($group->$option_name)) {
		$tabs[] = array(
			'text' => elgg_echo($option->name),
			'href' => "groups/profile/{$group->guid}?tab={$option->name}",
			'selected' => $tab == $option->name ? true : false,
		);
	}
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
