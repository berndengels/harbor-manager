class Fullscreen {
	init(url) {
		this.img = document.createElement('img');
		this.img.src = url;
		this.openFullscreen(this.img);
	}

	openFullscreen(img) {
		$(img).appendTo('body');
		if (img.requestFullscreen) {
			img.requestFullscreen();
		} else if (img.webkitRequestFullscreen) { /* Safari */
			console.info("webkitRequestFullscreen")
			img.webkitRequestFullscreen();
		} else if (img.msRequestFullscreen) { /* IE11 */
			console.info("msRequestFullscreen")
			img.msRequestFullscreen();
		}

		$(img).click(() => {
			this.closeFullscreen();
		});
	}
	closeFullscreen (img) {
		$(img).remove();
		this.img = null;
		delete this.img;

		if (document.exitFullscreen) {
			document.exitFullscreen();
		} else if (document.webkitExitFullscreen) { /* Safari */
			document.webkitExitFullscreen();
		} else if (document.msExitFullscreen) { /* IE11 */
			document.msExitFullscreen();
		}
	}
}

export default Fullscreen
