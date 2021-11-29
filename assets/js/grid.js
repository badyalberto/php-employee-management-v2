import { controller } from "./gridController.js";

(function setGrid() {
	jsGrid.setDefaults("text", {
		css: "overflow-hidden",
	});

	$("#grid-table").jsGrid({
		width: "100%",
		height: "600px",

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
		pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
		pagePrevText: "Prev",
		pageNextText: "Next",
		pageFirstText: "First",
		pageLastText: "Last",
		pageNavigatorNextText: "...",
		pageNavigatorPrevText: "...",

		//controller: controller,

		fields: [
			{
				title: "",
				name: "id",
				type: "number",
				css: "d-none",
			},
			{
				title: "First Name",
				name: "name",
				type: "text",
				validate: "required",
			},
			{
				title: "Last Name",
				name: "lastname",
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
				validate: "required",
			},
			{
				title: "Age",
				name: "age",
				type: "text",
				validate: function (value) {
					if (value > 18) {
						return true;
					}
				},
			},
			{
				title: "address",
				name: "Address",
				type: "text",
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
				name: "postalcode",
				type: "text",
				validate: "required",
			},
			{
				title: "Phone Number",
				name: "phone",
				type: "text",
				validate: "required",
			},
			{
				type: "control",
			},
		],
	});
})();
