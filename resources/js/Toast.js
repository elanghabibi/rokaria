
class Toast {
    constructor() {
        this.toast = document.getElementById('toast');

        this.init();
    }

    init() {
    	if (!this.toast) return;
        setTimeout(() => {
        	this.toast.classList.remove('opacity-100');
            this.toast.classList.add('opacity-0');

            setTimeout(() => {
                this.toast.remove();
            }, 500);
        }, 3000);
    }
}

new Toast