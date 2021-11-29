export const controller = {
	loadData: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "../employee/getAll",
			dataType: "json",
			data: item,
			success: function (response) {
				d.resolve(response.data);
			},
			error: function (xhr, exception) {
				console.log(`Error: ${xhr} ${exception}`);
			},
		});

		return d.promise();
	},
	insertItem: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "../employee/create",
			dataType: "json",
			data: item,
			success: function (response) {
				if (response.type === "danger") {
					d.reject();
				} else {
					d.resolve(response.data);
				}
			},
			error: function (xhr) {
				d.reject();
			},
		});

		return d.promise();
	},
	updateItem: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "../employee/update",
			dataType: "json",
			data: item,
			success: function (response) {
				if (response.type === "danger") {
					d.reject();
				} else {
					d.resolve(response.data);
				}
			},
			error: function (xhr) {
				d.reject();
			},
		});

		return d.promise();
	},
	deleteItem: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "../employee/delete",
			dataType: "json",
			data: item,
			success: function (response) {
				if (response.type === "danger") {
					d.reject();
				} else {
					d.resolve(response.data);
				}
			},
			error: function (xhr) {
				d.reject();
			},
		});

		return d.promise();
	},
};
