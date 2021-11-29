const controller = {
	loadData: function (get) {
		return $.ajax({
			type: "GET",
			url: "./employee/getAll",
			dataType: "json",
			data: get,
			success: function (get) {
				console.log(get);
			},
			error: function (get) {
				console.log(get);
			},
		});
	},
	insertItem: function (post) {
		return $.ajax({
			type: "POST",
			url: "./employee/create",
			dataType: "json",
			data: post,
		});
	},
	updateItem: function (item) {
		console.log(item);
		return $.ajax({
			type: "PUT",
			url: "./employee/update",
			dataType: "json",
			data: item,
			success: function (item) {
				console.log(item);
			},
			error: function (request, error) {
				console.log(error);
				console.log(request);
			},
		});
	},
	deleteItem: function (item) {
		return $.ajax({
			type: "DELETE",
			url: "./employee/delete",
			dataType: "json",
			data: item,
			success: function (item) {
				console.log(item);
			},
			error: function (request, error) {
				console.log(error);
				console.log(request);
			},
		});
	},
};
