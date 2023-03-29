<?php

/**
* @var array $arResult
*/

\Bitrix\Main\UI\Extension::load('up.task-list');
\Bitrix\Main\UI\Extension::load('up.delete-task');

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<div class="task-list">

	<div class="mb-4">
		<div class="field">
			<label class="label"></label>
			<div class="control">
				<a id="create-task" href="/tasks/create/" class="button is-success">Create task</a>
			</div>
		</div>
	</div>

	<table class="table is-hoverable is-fullwidth mb-6" id="task-list-app">
	</table>

	<div class="pagination-block">
		<nav class="pagination" role="navigation" aria-label="pagination">
			<ul class="pagination-list">
				<li>
					<a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
				</li>
				<li>
					<a class="pagination-link" aria-label="Goto page 2">2</a>
				</li>
				<li>
					<a class="pagination-link" aria-label="Goto page 3">3</a>
				</li>
			</ul>
		</nav>
	</div>
</div>

<script>
	BX.ready(function() {
		window.TasksTaskList = new BX.Up.Tasks.TaskList({
			rootNodeId: 'task-list-app',
		});
	});
</script>

<script>
	BX.ready(function() {
		document.addEventListener('click', function(e) {
			let id = e.target.id;
			window.TasksDeleteTask = new BX.Up.Tasks.DeleteTask({
				rootNodeId: id,
			})
		});
	});
</script>