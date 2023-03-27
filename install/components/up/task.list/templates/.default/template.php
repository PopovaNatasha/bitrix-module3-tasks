<div style="width: 100%">
	<div class="mb-4">
		<a href="/projects/123/issue/" class="button is-success">Create issue</a>
	</div>

	<table class="table is-hoverable is-fullwidth mb-6">
		<thead>
		<tr>
			<th>#</th>
			<th>Task</th>
			<th>Responsible</th>
			<th>Priority</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($arResult['ISSUES'] as $issue):?>
			<tr>
				<td><?=$issue['ID']?></td>
				<td><a href="/issues/<?=$issue['ID'];?>/"><?=$issue['NAME']?></a></td>
				<td><?=$issue['RESPONSIBLE']?></td>
				<td><span class="tag is-danger"><?=$issue['PRIORITY']?></span></td>
				<td><span class="tag is-info"><?=$issue['STATUS']?></span></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>

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