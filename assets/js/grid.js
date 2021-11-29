import { controller } from "./gridController.js";

(function setGrid() {
	jsGrid.setDefaults("text", {
		css: "overflow-hidden",
	});

	$("#grid-table").jsGrid({
		width: "100%",

		heading: true,
		inserting: true,
		editing: true,
		sorting: true,
		paging: true,
		autoload: true,
		noDataContent: "Not found",

		pageIndex: 1,
		pageSize: 10,
		pageButtonCount: 15,
		pagerFormat: "Pages: {first} {prev} {pages} {next} {last} {pageIndex} of {pageCount}",
		pagePrevText: "Prev",
		pageNextText: "Next",
		pageFirstText: "First",
		pageLastText: "Last",
		pageNavigatorNextText: "...",
		pageNavigatorPrevText: "...",

		controller: controller,

		fields: [
			{
				title: "employee_id",
				name: "employee_id",
				type: "number",
				css: "d-none",
			},
			{
				title: "First Name",
				name: "first_name",
				type: "text",
				validate: "required",
			},
			{
				title: "Last Name",
				name: "last_name",
				type: "text",
				validate: "required",
			},
			{
				title: "Email",
				name: "email",
				type: "text",
				validate: "required",
			},
			{
				title: "Gender",
				name: "gender",
				type: "text",
				validate: function (value) {
					return ["M", "F"].includes(value);
				},
			},
			{
				title: "Street",
				name: "street",
				type: "text",
				validate: "required",
			},
			{
				title: "Age",
				name: "age",
				type: "number",
				validate: "required",
			},
			{
				title: "City",
				name: "city",
				type: "text",
				validate: "required",
			},
			{
				title: "State",
				name: "state",
				type: "text",
				validate: "required",
			},
			{
				title: "Postal Code",
				name: "postal_code",
				type: "text",
				validate: "required",
			},
			{
				title: "Phone Number",
				name: "phone_number",
				type: "text",
				validate: "required",
			},
			{
				type: "control",
			},
		],
	});
})();
