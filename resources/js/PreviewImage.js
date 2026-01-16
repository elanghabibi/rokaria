class PreviewImage {
	constructor(input, preview, placeholder) {
		this.input = document.getElementById(input);
		this.preview = document.getElementById(preview);
		this.placeholderText = document.getElementById(placeholder)

		this.init();
	}

	init() {
		if (!this.input || !this.preview || !this.placeholderText) return;
		this.input.addEventListener('change', (e) => this.handlePreview(e))
	}

	handlePreview(event) {
		const file = event.target.files[0]
		if (!file) return;

		const url = URL.createObjectURL(file);
		this.preview.src = url
		this.preview.classList.remove('hidden')
		this.placeholderText.classList.add('hidden')
	}
}

new PreviewImage('previewInput', 'previewImg', 'previewPlaceholder')