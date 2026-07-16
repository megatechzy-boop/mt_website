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

    const revealElements = document.querySelectorAll('[data-reveal]');
    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-revealed');
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.12 });
        revealElements.forEach((element) => revealObserver.observe(element));
    } else {
        revealElements.forEach((element) => element.classList.add('is-revealed'));
    }

    document.querySelectorAll('[data-lead-form]').forEach((form) => {
        const status = form.querySelector('[data-form-status]');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            if (status) {
                status.textContent = 'Sending your enquiry...';
                status.classList.remove('is-success', 'is-error');
                status.classList.add('is-pending');
            }
            const button = form.querySelector('button[type="submit"]');
            if (button) {
                button.disabled = true;
                button.setAttribute('aria-busy', 'true');
            }

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: { 'Accept': 'application/json' },
                });
                const contentType = response.headers.get('content-type') || '';
                const data = contentType.includes('application/json') ? await response.json() : {};
                if (!response.ok || !data.ok) {
                    throw new Error(data.message || 'Please check the form and try again.');
                }
                form.reset();
                if (status) {
                    status.textContent = data.message;
                    status.classList.add('is-success');
                    status.classList.remove('is-pending', 'is-error');
                }
            } catch (error) {
                if (status) {
                    status.textContent = error.message || 'Something went wrong. Please try again.';
                    status.classList.remove('is-success', 'is-pending');
                    status.classList.add('is-error');
                }
            } finally {
                if (button) {
                    button.disabled = false;
                    button.removeAttribute('aria-busy');
                }
            }
        });
    });
})();
