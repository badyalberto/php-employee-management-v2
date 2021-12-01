function addNotification({ type, content }) {
	const container = document.querySelector("#notification-container");
	const notification = getNotification({ type, content });

	if (!container) return;

	container.insertAdjacentHTML("beforeend", notification);
}

function getNotification({ type, content }) {
	const notification = `
		<div class="toast align-items-center bg-${type} text-white fade show" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="d-flex">
				<div class="toast-body">
					${content}
				</div>
				<button type="button" class="btn-close me-2 m-auto text-white" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
		</div>
	`;

	return notification;
}

export { addNotification, getNotification };
