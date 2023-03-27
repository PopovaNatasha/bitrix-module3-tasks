window.addEventListener('load', () => {
	const tabButtons = document.querySelectorAll('.tabs a');
	const tabContainers = document.querySelectorAll('.tabs-content div');

	tabButtons.forEach(button => {
		button.addEventListener('click', (event) => {
			event.preventDefault();
			tabButtons.forEach(btn => {
				btn.parentElement.classList.remove('is-active');
			});
			button.parentElement.classList.add('is-active');

			const id = event.target.hash.substring(1);
			tabContainers.forEach(container => container.classList.remove('active'));
			document.getElementById(id).classList.add('active');
		})
	})
})