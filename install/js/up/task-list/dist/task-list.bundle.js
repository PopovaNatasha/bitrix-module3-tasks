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
	      var table = this.rootNode;
	      var taskList = this.taskList;
	      var headList = ['#', 'Task', 'Status', 'Priority', 'Responsible', ''];
	      var thead = document.createElement('thead');
	      var tbody = document.createElement('tbody');
	      table.appendChild(thead);
	      table.appendChild(tbody);
	      var tr = document.createElement('tr');
	      headList.forEach(function (head) {
	        var th = document.createElement('th');
	        th.innerHTML = head;
	        tr.appendChild(th);
	        thead.appendChild(tr);
	      });
	      taskList.forEach(function (taskData) {
	        var tr = document.createElement('tr');
	        for (var key in taskData) {
	          var td = document.createElement('td');
	          td.innerHTML = taskData[key];
	          tr.appendChild(td).className = 'task';
	        }
	        var rowDelete = document.createElement('td');
	        var buttonDelete = document.createElement('button');
	        buttonDelete.id = taskData['ID'];
	        rowDelete.appendChild(buttonDelete).className = "delete is-small";
	        tr.appendChild(rowDelete);
	        tbody.appendChild(tr);
	      });
	    }
	  }]);
	  return TaskList;
	}();

	exports.TaskList = TaskList;

}((this.BX.Up.Tasks = this.BX.Up.Tasks || {}),BX));
