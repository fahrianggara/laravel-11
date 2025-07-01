class Modal {
    constructor(target, options = {}) {
        this.modal = typeof target === 'string' ? document.getElementById(target) : target;
        this.options = Object.assign({
            backdrop: true,
            keyboard: true,
            duration: 200
        }, options);
        this._bindEvents();
    }

    show() {
        this._createBackdrop();
        this.modal.classList.remove('hidden');
        this.modal.classList.remove('fade-out');
        this.modal.style.animationDuration = `${this.options.duration}ms`;
        this.modal.offsetHeight; // force reflow
        this.modal.classList.add('fade-in');
        this.modal.style.zIndex = '50';
        this.modal.style.pointerEvents = 'auto';
    }

    hide() {
        this.modal.classList.remove('fade-in');
        this.modal.classList.add('fade-out');
        this.modal.style.animationDuration = `${this.options.duration}ms`;
        this.modal.style.pointerEvents = 'none';

        setTimeout(() => {
            this.modal.classList.add('hidden');
            this._removeBackdrop();
        }, this.options.duration);
    }

    _createBackdrop() {
        this.backdrop = document.createElement('div');
        this.backdrop.className = 'modal-backdrop fixed inset-0 bg-black/50 opacity-0 transition-opacity z-40';
        this.backdrop.style.transitionDuration = `${this.options.duration}ms`;
        document.body.appendChild(this.backdrop);

        requestAnimationFrame(() => {
            this.backdrop.classList.add('opacity-100');
        });

        // Hanya tambahkan event close jika backdrop bukan 'static'
        if (this.options.backdrop !== 'static') {
            this.backdrop.addEventListener('click', () => this.hide());
        }
    }

    _removeBackdrop() {
        if (!this.backdrop) return;
        this.backdrop.classList.remove('opacity-100');
        this.backdrop.classList.add('opacity-0');
        this.backdrop.style.transitionDuration = `${this.options.duration}ms`;

        setTimeout(() => {
            this.backdrop?.remove();
            this.backdrop = null;
        }, this.options.duration);
    }

    _bindEvents() {
        if (this.options.keyboard) {
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    this.hide();
                }
            });
        }

        const closeButtons = this.modal.querySelectorAll('[data-dismiss="modal"]');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => this.hide());
        });
    }
}
