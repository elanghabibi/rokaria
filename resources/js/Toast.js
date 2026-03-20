class Toast {
    constructor() {
        this.toast = document.getElementById('toast');

        this.init();
    }

    init() {
    	if (!this.toast) return;
        setTimeout(() => {
        	this.toast.classList.remove('opacity-100', 'translate-y-0');
            this.toast.classList.add('opacity-0', '-translate-y-20');

            setTimeout(() => {
                this.toast.remove();
            }, 500);
        }, 3000);
    }
}

new Toast