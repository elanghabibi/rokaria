class Disclosure {
	constructor(el) {
		this.el = el;
		this.btn = this.el.querySelector('.disclosure-btn');
		this.panel = this.el.querySelector('.disclosure-panel');
		this.isOpen = false;

		this.handleClickOutside = this.handleClickOutside.bind(this);

		this.init();

	}

	init() {
		if (!this.el || !this.btn || !this.panel) return;
		this.btn.addEventListener('click', () => this.toggle());
	}

	toggle() {
		this.isOpen ? this.hidden() : this.show();
	}

	handleClickOutside(e) {
		if (!this.el.contains(e.target)) {
			this.hidden();
		}
	}

	show() {
		this.isOpen = true;
		this.panel.classList.remove('opacity-0');
		this.panel.classList.remove('pointer-events-none');
		this.panel.classList.add('opacity-100');
		this.panel.classList.add('pointer-events-auto')

		document.addEventListener('click', this.handleClickOutside);
	}

	hidden() {
		this.isOpen = false;
		this.panel.classList.remove('opacity-100');
		this.panel.classList.remove('pointer-events-auto');
		this.panel.classList.add('opacity-0');
		this.panel.classList.add('pointer-events-none')

		document.removeEventListener('click', this.handleClickOutside);
	}
}

document.querySelectorAll('.disclosure').forEach((el) => {
	new Disclosure(el);
})