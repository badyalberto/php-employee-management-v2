<div aria-live="polite" aria-atomic="true" class="position-relative">
	<div id="notification-container" class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 1;">
		<?php if (isset($this->message)) : ?>
			<div class="toast align-items-center bg-<?= $this->message["type"] ?> text-white fade show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						<?= $this->message["content"] ?>
					</div>
					<button type="button" class="btn-close me-2 m-auto text-white" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		<?php endif ?>
	</div>
</div>