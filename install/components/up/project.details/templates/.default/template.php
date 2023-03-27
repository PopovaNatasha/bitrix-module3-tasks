<?php

/**
 * @var array $arResult
 * @var array $arParams
 * @var CMain $APPLICATION
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

?>
<section class="hero is-success">
	<div class="hero-body">
		<p class="title">
			<?=$arResult['PROJECT']['NAME'];?>
		</p>
		<p class="subtitle">
			<?=$arResult['PROJECT']['DESCRIPTION'];?>
		</p>
	</div>
</section>

<div class="tabs">
	<ul>
		<li class="is-active"><a href="#tasks">Tasks</a></li>
		<li><a href="#members">Members</a></li>
		<li><a href="#wiki">Wiki</a></li>
		<li><a href="#settings">Settings</a></li>
	</ul>
</div>

<div class="tabs-content">
	<div id="tasks" class="active">
		<?php $APPLICATION->IncludeComponent('up:task.list', '', [
			'PROJECT_ID' => $arResult['PROJECT']['ID'],
		]);?>
	</div>
	<div id="members">
		<table class="table is-hoverable is-fullwidth mb-6">
			<thead>
			<tr>
				<th>User</th>
				<th>Role</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Eugene Zadorin</td>
				<td><span class="tag">Admin</span></td>
			</tr>
			<tr>
				<td>Ivan Petrov</td>
				<td><span class="tag">Developer</span></td>
			</tr>
			<tr>
				<td>Olga Ivanova</td>
				<td>
					<span class="tag">Designer</span>
					<span class="tag">Project manager</span>
				</td>
			</tr>
			<tr>
				<td>Alisa Crow</td>
				<td><span class="tag">QA</span></td>
			</tr>
			<tr>
				<td>Evan McGregor</td>
				<td><span class="tag">Project manager</span></td>
			</tr>
			</tbody>
		</table>
	</div>
	<div id="wiki">
		<div class="content">
			<h2 class="title">Wiki</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias cupiditate eius enim eos harum laudantium neque non reprehenderit tempore vero voluptas, voluptatem voluptates. Dolore earum optio repudiandae soluta tempore.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores molestiae pariatur quae quibusdam veritatis. At fuga hic ipsum porro reprehenderit sapiente soluta! Aliquam aut cum ea illo mollitia quam, quasi.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet atque cum deserunt excepturi harum, nihil officia perspiciatis qui sequi totam vel velit. Deserunt doloribus, ducimus harum nobis numquam praesentium repellendus!</p>
		</div>
	</div>
	<div id="settings">
		<div class="columns is-flex-grow-1">
			<div class="column">
				<div class="field">
					<label class="label">Title</label>
					<div class="control">
						<input class="input" type="text" placeholder="Project title">
					</div>
				</div>

				<div class="field">
					<label class="label">Description</label>
					<div class="control">
						<textarea class="textarea" placeholder="Project description"></textarea>
					</div>
				</div>

				<div class="field">
					<label class="label">Privacy</label>
					<div class="control">
						<div class="select">
							<select>
								<option>Private project</option>
								<option>Public project</option>
							</select>
						</div>
					</div>
				</div>

				<div class="field is-grouped">
					<div class="control">
						<button class="button is-link">Submit</button>
					</div>
					<div class="control">
						<button class="button is-link is-light">Cancel</button>
					</div>
				</div>
			</div>
			<div class="column is-flex is-justify-content-flex-end">
				<a href="#" class="button is-danger">Remove project</a>
			</div>
		</div>
	</div>
</div>


