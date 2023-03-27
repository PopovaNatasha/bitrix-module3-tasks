document.onclick = function() {
	div = Array.from(document.querySelectorAll('.task'));
	div.forEach((e) => {
		e.onclick = function() {
			this.remove();
		}
	});
}