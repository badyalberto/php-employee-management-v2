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

				if (message.type === "danger" && data) {
					addNotification(message);
					d.reject();
				} else {
					d.resolve(data);
				}
			},
			error: function () {
				addNotification({ type: "danger", content: "Something went wrong." });
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
				const { message, data } = response;

				addNotification(message);

				message.type === "danger" || !data ? d.reject() : d.resolve({ ...item, ...data });
			},
			error: function () {
				addNotification({ type: "danger", content: "Something went wrong." });
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
			error: function () {
				addNotification({ type: "danger", content: "Something went wrong." });
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
			error: function () {
				addNotification({ type: "danger", content: "Something went wrong." });
				d.reject();
			},
		});

		return d.promise();
	},
};
