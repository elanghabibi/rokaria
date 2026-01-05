class ShowPassword {
	constructor(el) {
		this.container = el;
		this.input = this.container.querySelector('.password-input')
		this.btnIcon = this.container.querySelector('.password-btn-icon');

		this.showIcon = 'bx-eye';
		this.hideIcon = 'bx-eye-slash';

		this.handleToggle = this.handleToggle.bind(this);

		this.init();
	}

	init() {
		if (!this.container || !this.input || !this.btnIcon) return;
		this.btnIcon.addEventListener('click', this.handleToggle);
	}

	handleToggle() {
		const isPassword = this.input.type === 'password';

		this.input.type = isPassword ? 'text' : 'password';

		this.renderIcon(isPassword);
	}

	renderIcon(isPassword) {
		this.btnIcon.classList.remove(this.showIcon, this.hideIcon);
		this.btnIcon.classList.add(isPassword ? this.hideIcon : this.showIcon);
	}
}

document.querySelectorAll('.show-password').forEach((el) => {
	new ShowPassword(el);
})