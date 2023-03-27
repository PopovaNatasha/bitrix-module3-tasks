<?php foreach ($arResult['ISSUES'] as $issue):?>
	<div class="card task-card">
		<header class="card-header">
			<a class="card-header-title" href="/projects/<?=$project['id'];?>/">
				<?= $issue['NAME']; ?>
			</a>
		</header>
		<div class="card-content">
			<div class="content">
				<?=$issue['STATUS'];?>
			</div>
		</div>
	</div>
<?php endforeach; ?>
