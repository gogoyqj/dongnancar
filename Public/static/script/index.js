define([], function() {
	return function() {
		avalon.define("admin", function(vm) {
			vm.menu = MenuData;
			vm.view = '';
			vm.viewTo = function(e, view) {
				vm.view = view;
			}
		})

		avalon.scan()
	}
})