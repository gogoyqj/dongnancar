define("login", [], function() {
	return function() {
		$('.login-form').on('submit', function(e) {
			var err, dic = {'text': 1, 'password': 1};
			$(this).find('input').each(function(i, item) {
				if(item.type in dic) {
					if(!$.trim(item.value) && !err) err = item;
				}
			})
			if(err) {
				e.preventDefault();
				alert(err.getAttribute("placeholder"));
			}
		})
	}
})