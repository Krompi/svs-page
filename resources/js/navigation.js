document.addEventListener('DOMContentLoaded', () => {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
            mobileMenuButton.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Dropdown toggle logic for both mobile and desktop (since both use click)
    const dropdownButtons = document.querySelectorAll('.dropdown-toggle');

    dropdownButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            const dropdownMenu = button.nextElementSibling;
            const isExpanded = button.getAttribute('aria-expanded') === 'true';

            // Close other open dropdowns
            closeAllDropdowns(button);

            // Toggle current dropdown
            button.setAttribute('aria-expanded', !isExpanded);
            if (dropdownMenu) {
                dropdownMenu.classList.toggle('hidden');
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', () => {
        closeAllDropdowns();
    });

    function closeAllDropdowns(exceptButton = null) {
        dropdownButtons.forEach(button => {
            if (button !== exceptButton) {
                button.setAttribute('aria-expanded', 'false');
                const dropdownMenu = button.nextElementSibling;
                if (dropdownMenu) {
                    dropdownMenu.classList.add('hidden');
                }
            }
        });
    }
});
