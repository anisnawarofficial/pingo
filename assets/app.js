import './styles/app.css';

import {
    BookOpen,
    CalendarDays,
    ChartColumn,
    ChevronDown,
    ChevronLeft,
    ChevronRight,
    ChevronUp,
    ChevronsLeft,
    ChevronsRight,
    ContactRound,
    Copy,
    CreditCard,
    Euro,
    Eye,
    FileText,
    Headphones,
    Headset,
    History,
    House,
    Info,
    Lock,
    LogOut,
    MoreVertical,
    Package,
    Pencil,
    createIcons,
    MapPin,
    PhoneCall,
    Plus,
    Search,
    Settings,
    Stethoscope,
    Trash2,
    User,
    UsersRound,
    WalletCards,
    X
} from 'lucide';

const icons = {
    BookOpen,
    CalendarDays,
    ChartColumn,
    ChevronDown,
    ChevronLeft,
    ChevronRight,
    ChevronUp,
    ChevronsLeft,
    ChevronsRight,
    ContactRound,
    Copy,
    CreditCard,
    Euro,
    Eye,
    FileText,
    Headphones,
    Headset,
    History,
    House,
    Info,
    Lock,
    LogOut,
    MoreVertical,
    Package,
    Pencil,
    MapPin,
    PhoneCall,
    Plus,
    Search,
    Settings,
    Stethoscope,
    Trash2,
    User,
    UsersRound,
    WalletCards,
    X
};

const renderIcons = () => {
    createIcons({
        icons,
        attrs: {
            class: 'ui-icon',
            'stroke-width': 1.9,
            'aria-hidden': 'true'
        }
    });
};

const syncRdvSubmenuAccessibility = (page) => {
    const isCollapsed = page.classList.contains('rdv-page--sidebar-collapsed');

    page.querySelectorAll('[data-sidebar-submenu]').forEach((group) => {
        const submenu = group.querySelector('.rdv-nav__submenu');
        const isOpen = group.classList.contains('is-open');
        const shouldHideLinks = isCollapsed || !isOpen;

        if (!submenu) {
            return;
        }

        submenu.setAttribute('aria-hidden', String(shouldHideLinks));
        submenu.querySelectorAll('a').forEach((link) => {
            if (shouldHideLinks) {
                link.setAttribute('tabindex', '-1');
            } else {
                link.removeAttribute('tabindex');
            }
        });
    });
};

const initRdvSidebar = () => {
    const page = document.querySelector('[data-rdv-page]');
    const toggle = document.querySelector('[data-sidebar-toggle]');

    if (!page || !toggle) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isCollapsed = page.classList.toggle('rdv-page--sidebar-collapsed');

        syncRdvSubmenuAccessibility(page);

        toggle.setAttribute('aria-expanded', String(!isCollapsed));
        toggle.setAttribute(
            'aria-label',
            isCollapsed ? 'Ouvrir le menu' : 'Réduire le menu'
        );
    });

    page.querySelectorAll('[data-sidebar-submenu-toggle]').forEach((submenuToggle) => {
        submenuToggle.addEventListener('click', () => {
            const group = submenuToggle.closest('[data-sidebar-submenu]');

            if (!group) {
                return;
            }

            const isOpen = group.classList.toggle('is-open');
            submenuToggle.setAttribute('aria-expanded', String(isOpen));
            syncRdvSubmenuAccessibility(page);
        });
    });

    syncRdvSubmenuAccessibility(page);
};

const initRdvPanelToggle = () => {
    const page = document.querySelector('[data-rdv-page]');

    if (!page) {
        return;
    }

    const toggles = Array.from(page.querySelectorAll('[data-rdv-view-toggle]'));
    const views = Array.from(page.querySelectorAll('[data-rdv-panel-view]'));

    if (!toggles.length || !views.length) {
        return;
    }

    const setView = (targetView) => {
        toggles.forEach((toggle) => {
            const isActive = toggle.dataset.rdvViewToggle === targetView;

            toggle.classList.toggle('is-active', isActive);
            toggle.setAttribute('aria-pressed', String(isActive));
        });

        views.forEach((view) => {
            const isActive = view.dataset.rdvPanelView === targetView;

            view.classList.toggle('is-active', isActive);

            if (isActive) {
                view.removeAttribute('aria-hidden');
                view.removeAttribute('inert');
            } else {
                view.setAttribute('aria-hidden', 'true');
                view.setAttribute('inert', '');
            }
        });
    };

    toggles.forEach((toggle) => {
        toggle.addEventListener('click', () => {
            setView(toggle.dataset.rdvViewToggle);
        });
    });

    const activeToggle = toggles.find((toggle) => toggle.classList.contains('is-active'));
    setView(activeToggle ? activeToggle.dataset.rdvViewToggle : 'rdv');
};

const initHistoriqueModal = () => {
    const modalOverlay = document.querySelector('[data-historique-modal]');
    const openButtons = Array.from(document.querySelectorAll('[data-open-historique-modal]'));

    if (!modalOverlay || !openButtons.length) {
        return;
    }

    const closeButtons = Array.from(modalOverlay.querySelectorAll('[data-close-historique-modal]'));
    const closeButton = closeButtons[0] || null;
    let closeTimer;

    const openModal = () => {
        window.clearTimeout(closeTimer);
        modalOverlay.hidden = false;
        document.body.classList.add('has-historique-modal');

        window.requestAnimationFrame(() => {
            modalOverlay.classList.add('is-open');
            closeButton?.focus();
        });
    };

    const closeModal = () => {
        modalOverlay.classList.remove('is-open');
        document.body.classList.remove('has-historique-modal');

        closeTimer = window.setTimeout(() => {
            modalOverlay.hidden = true;
        }, 220);
    };

    openButtons.forEach((button) => {
        button.addEventListener('click', openModal);
    });

    closeButtons.forEach((button) => {
        button.addEventListener('click', closeModal);
    });

    modalOverlay.addEventListener('click', (event) => {
        if (event.target === modalOverlay) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modalOverlay.hidden) {
            closeModal();
        }
    });
};

const initPaymentModal = () => {
    const modalOverlay = document.querySelector('[data-payment-modal]');
    const openButton = document.querySelector('[data-open-payment-modal]');

    if (!modalOverlay || !openButton) {
        return;
    }

    const closeButtons = Array.from(modalOverlay.querySelectorAll('[data-close-payment-modal]'));
    const closeButton = closeButtons[0] || null;
    let closeTimer;

    const openModal = () => {
        window.clearTimeout(closeTimer);
        modalOverlay.hidden = false;
        document.body.classList.add('has-payment-modal');

        window.requestAnimationFrame(() => {
            modalOverlay.classList.add('is-open');
            closeButton?.focus();
        });
    };

    const closeModal = () => {
        modalOverlay.classList.remove('is-open');
        document.body.classList.remove('has-payment-modal');

        closeTimer = window.setTimeout(() => {
            modalOverlay.hidden = true;
        }, 220);
    };

    openButton.addEventListener('click', openModal);

    closeButtons.forEach((button) => {
        button.addEventListener('click', closeModal);
    });

    modalOverlay.addEventListener('click', (event) => {
        if (event.target === modalOverlay) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modalOverlay.hidden) {
            closeModal();
        }
    });
};

const boot = () => {
    renderIcons();
    initRdvSidebar();
    initRdvPanelToggle();
    initHistoriqueModal();
    initPaymentModal();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
} else {
    boot();
}
