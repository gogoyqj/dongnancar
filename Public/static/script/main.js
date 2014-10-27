window.loadCN = function(en) {
	return window.dict && window.dict[en] || en;
}
define(['login', 'index'], function(login, index) {
	return {
		login: login,
		index: index
	}
})