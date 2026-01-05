class CharCounter {
	constructor(el) {
		this.container = el;
		this.input = this.container.querySelector('.charcounter-input')
		this.counter = this.container.querySelector('.charcounter-preview');

		this.init();
	}

	init() {
		if (!this.container || !this.input || !this.counter) return;
		this.input.addEventListener('input', () => this.updateCounter())
	}

	updateCounter() {
		const length = this.input.value.length;

		this.counter.textContent = `${length}`
	}
}

document.querySelectorAll('.charcounter').forEach((el) => {
	new CharCounter(el);
});