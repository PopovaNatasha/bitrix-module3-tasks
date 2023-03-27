this.BX = this.BX || {};
this.BX.Up = this.BX.Up || {};
(function (exports,main_core) {
	'use strict';

	var TaskList = /*#__PURE__*/function () {
	  function TaskList() {
	    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
	    babelHelpers.classCallCheck(this, TaskList);
	    if (main_core.Type.isStringFilled(options.rootNodeId)) {
	      this.rootNodeId = options.rootNodeId;
	    } else {
	      throw new Error('TaskList: options.rootNodeId required');
	    }
	    this.rootNode = document.getElementById(this.rootNodeId);
	    if (!this.rootNode) {
	      throw new Error('TaskList: element with id "${this.rootNodeId}" not found');
	    }
	    this.taskList = [];
	    this.reload();
	  }
	  babelHelpers.createClass(TaskList, [{
	    key: "reload",
	    value: function reload() {
	      var _this = this;
	      this.loadList().then(function (taskList) {
	        _this.taskList = taskList;
	        _this.render();
	      });
	    }
	  }, {
	    key: "loadList",
	    value: function loadList() {
	      return new Promise(function (resolve, reject) {
	        BX.ajax.runAction('up:tasks.tasks.GetList', {
	          pageNumber: 1
	        }).then(function (response) {
	          var taskList = response.data.taskList;
	          resolve(taskList);
	        })["catch"](function (error) {
	          reject(error);
	        });
	      });
	    }
	  }, {
	    key: "render",
	    value: function render() {
	      this.rootNode.innerHTML = '';
	      var table = this.rootNode;
	      var thead = document.createElement('thead');
	      var tbody = document.createElement('tbody');
	      table.appendChild(thead);
	      table.appendChild(tbody);
	      var headRow = document.createElement('tr');
	      var headId = document.createElement('th');
	      headId.innerHTML = "#";
	      var headTask = document.createElement('th');
	      headTask.innerHTML = "Task";
	      var headDelete = document.createElement('th');
	      headDelete.innerHTML = "";
	      headRow.appendChild(headId);
	      headRow.appendChild(headTask);
	      headRow.appendChild(headDelete);
	      thead.appendChild(headRow);
	      this.taskList.forEach(function (taskData) {
	        var row = document.createElement('tr');
	        var rowId = document.createElement('td');
	        rowId.innerHTML = taskData.ID;
	        var rowTask = document.createElement('td');
	        rowTask.innerHTML = taskData.NAME;
	        var rowDelete = document.createElement('td');
	        var buttonDelete = document.createElement('button');
	        rowDelete.appendChild(buttonDelete).className = "delete is-small";
	        row.appendChild(rowId);
	        row.appendChild(rowTask);
	        row.appendChild(rowDelete);
	        tbody.appendChild(row);
	      });
	    }
	  }]);
	  return TaskList;
	}();

	exports.TaskList = TaskList;

}((this.BX.Up.Tasks = this.BX.Up.Tasks || {}),BX));
