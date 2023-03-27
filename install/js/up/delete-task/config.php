<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

return [
	'css' => 'dist/delete-task.bundle.css',
	'js' => 'dist/delete-task.bundle.js',
	'rel' => [
		'main.polyfill.core',
	],
	'skip_core' => true,
];