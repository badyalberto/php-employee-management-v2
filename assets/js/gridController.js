import { addNotification } from "./notification.js";

export const controller = {
	loadData: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "./employee/getAll",
			dataType: "json",
			data: item,
			success: function (response) {
				const { message, data } = response;

				if (data) {
					d.resolve(response.data);
				} else {
					addNotification(message);
					d.reject();
				}
			},
			error: function (xhr, exception) {
				addNotification({ type: "danger", content: xhr.statusText });
				d.reject();
			},
		});

		return d.promise();
	},
	insertItem: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "./employee/create",
			dataType: "json",
			data: item,
			success: function (response) {
				const { message } = response;

				addNotification(message);
				message.type === "danger" ? d.reject() : d.resolve();
			},
			error: function (xhr) {
				addNotification({ type: "danger", content: xhr.statusText });
				d.reject();
			},
		});

		return d.promise();
	},
	updateItem: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "./employee/update",
			dataType: "json",
			data: item,
			success: function (response) {
				const { message } = response;

				addNotification(message);
				message.type === "danger" ? d.reject() : d.resolve();
			},
			error: function (xhr) {
				addNotification({ type: "danger", content: xhr.statusText });
				d.reject();
			},
		});

		return d.promise();
	},
	deleteItem: function (item) {
		const d = $.Deferred();

		$.ajax({
			type: "POST",
			url: "./employee/delete",
			dataType: "json",
			data: item,
			success: function (response) {
				const { message } = response;

				addNotification(message);
				message.type === "danger" ? d.reject() : d.resolve();
			},
			error: function (xhr) {
				addNotification({ type: "danger", content: xhr.statusText });
				d.reject();
			},
		});

		return d.promise();
	},
};
