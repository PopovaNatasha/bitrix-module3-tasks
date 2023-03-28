import {Type} from 'main.core';

export class TaskList
{
	constructor(options = {})
	{
		if (Type.isStringFilled(options.rootNodeId))
		{
			this.rootNodeId = options.rootNodeId;
		}
		else
		{
			throw new Error('TaskList: options.rootNodeId required');
		}

		this.rootNode = document.getElementById(this.rootNodeId);
		if (!this.rootNode)
		{
			throw new Error('TaskList: element with id "${this.rootNodeId}" not found');
		}

		this.taskList = [];
		this.reload();
	}

	reload()
	{
		this.loadList()
			.then(taskList => {
				this.taskList = taskList;

				this.render();
			});
	}

	loadList()
	{
		return new Promise((resolve, reject) => {
			BX.ajax.runAction(
				'up:tasks.tasks.GetList',
				{
					pageNumber: 1,
				})
				.then((response) => {
					const taskList = response.data.taskList;

					resolve(taskList);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}

	render()
	{
		let table = this.rootNode;
		let taskList = this.taskList;

		let headList = ['#', 'Task', 'Status', 'Priority', 'Responsible', ''];

		let thead = document.createElement('thead');
		let tbody = document.createElement('tbody');
		table.appendChild(thead);
		table.appendChild(tbody);

		let tr = document.createElement('tr');
		headList.forEach(head => {
			let th = document.createElement('th');
			th.innerHTML = head;
			tr.appendChild(th);
			thead.appendChild(tr);
		});

		taskList.forEach(taskData => {
			let tr = document.createElement('tr');
			for (var key in taskData)
			{
				let td = document.createElement('td');
				td.innerHTML = CUtil::JSEscape(taskData[key]);
				tr.appendChild(td).className = 'task';
			}
			let rowDelete = document.createElement('td');
			let buttonDelete = document.createElement('button');
			buttonDelete.id = taskData['ID'];
			rowDelete.appendChild(buttonDelete).className = "delete is-small";
			tr.appendChild(rowDelete);

			tbody.appendChild(tr);
		});
	}
}