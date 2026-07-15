(function () {
    const navToggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');
    if (navToggle && navLinks) {
        navToggle.addEventListener('click', () => {
            const isOpen = navToggle.getAttribute('aria-expanded') === 'true';
            navToggle.setAttribute('aria-expanded', String(!isOpen));
            navLinks.classList.toggle('is-open', !isOpen);
        });
    }

    const modal = document.querySelector('[data-modal]');
    const openButtons = document.querySelectorAll('[data-open-modal]');
    const closeButtons = document.querySelectorAll('[data-close-modal]');
    const closeModal = () => {
        if (!modal) return;
        modal.hidden = true;
        document.body.classList.remove('modal-open');
    };
    const openModal = () => {
        if (!modal) return;
        modal.hidden = false;
        document.body.classList.add('modal-open');
        const firstInput = modal.querySelector('input[name="name"]');
        if (firstInput) firstInput.focus();
    };
    openButtons.forEach((button) => button.addEventListener('click', openModal));
    closeButtons.forEach((button) => button.addEventListener('click', closeModal));
    if (modal) {
        modal.addEventListener('click', (event) => {
            if (event.target === modal) closeModal();
        });
    }
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeModal();
    });

    document.querySelectorAll('[data-lead-form]').forEach((form) => {
        const status = form.querySelector('[data-form-status]');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            if (status) status.textContent = 'Sending...';
            const button = form.querySelector('button[type="submit"]');
            if (button) button.disabled = true;

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: { 'Accept': 'application/json' },
                });
                const data = await response.json();
                if (!response.ok || !data.ok) {
                    throw new Error(data.message || 'Please check the form and try again.');
                }
                form.reset();
                if (status) {
                    status.textContent = data.message;
                    status.classList.add('is-success');
                }
            } catch (error) {
                if (status) {
                    status.textContent = error.message || 'Something went wrong. Please try again.';
                    status.classList.remove('is-success');
                }
            } finally {
                if (button) button.disabled = false;
            }
        });
    });
})();

