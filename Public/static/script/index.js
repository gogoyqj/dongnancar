define([], function() {
	function postData(data) {
		$.ajax({
			method: "post",
			url: window.ajaxUrl + data.url + "?ajax=1",
			data: data.data ? (data.data.ajax = 1, data.data) : {ajax:1},
			dataType: "json"
		}).done(data.done)
	}
	avalon.each(MenuData, function(i, item) {
		item[1] = item[1].toLowerCase()
	})
	var Models = {};
	return function() {
		var admin = avalon.define("admin", function(vm) {
			vm.menu = MenuData;
			vm.nowData = MenuData[0];
			vm.view = 'cates';
			vm.subView = '';
			vm.action = ['add', 'change', 'delete'];
			// change view
			vm.viewTo = function(e, view, index) {
				e.preventDefault();
				if(vm.view == view.toLowerCase()) return;
				vm.view = view.toLowerCase();
				vm.subView = '';
				vm.nowData = vm.menu[index];
				var extraAction = vm.nowData[2];
				if(extraAction) {
					vm.action = vm.action.slice(0, 3).concat(extraAction.split(','))
				} else {
					vm.action.splice(3)
				}
				vm.getList(view);
			};
			vm.dict = window.dict;
			// change subView
			vm.subViewTo = function(e, subView, index) {
				vm.subView = subView;
			};
			vm.getList = function(type) {
				postData({
					url: "/getList/type/" + type,
					done: function(json) {
						var t = type.toLowerCase();
						if(json && !json.errorNum) {
							vm[t + "ModelList"] = json.list || [];
						} else {
							alert("出错了")
						}
					}
				})
			}
			// delete
			vm._delete = function(event, data) {
				event.preventDefault();
				if(data && data.id) {
					if(confirm("确认删除?")) {
						postData({
							url: "/ajax/type/" + vm.view + "/action/delete/id/" + data.id,
							done: function(res) {
								alert(!res || res.errorNum ? "操作失败" : "操作成功")
							}
						})
					}
				}
			}

			avalon.each(allModel, function(i, item) {
				vm[i + "List"] = [];
			})

		})

		Models.admin = admin;

		avalon.each(window.allModel, function(i, item) {
			var type = i.replace(/model/gi, '').toLowerCase()
			Models[i] = avalon.define( type + "AddModel", function(vm) {
				vm.addModel = {};
				avalon.each(item, function(j, jitem) {
					vm.addModel[jitem] = "";
				})
				vm.keys = item

				vm.setData = function(obj) {
					for(var i in obj) {
						vm[i] = obj[i]
					}
				}
				vm.getData = function() {
					return vm.$model
				}
				vm.add = function(event) {
					event.preventDefault();
					var data = {}, s = vm.addModel.$model;
					avalon.each(s, function(i, item) {
						if(item) data[i] = item;
					})
					postData({
						url: "/ajax/type/" + type + "/action/add/",
						data: data,
						done: function(r) {
							if(!r.errorNum) admin.getList(type)
						}
					})
				}
			})
		})
		admin.getList(admin.view);

		avalon.scan()
	}
})