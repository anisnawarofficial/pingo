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

const initIcons = () => {
    createIcons({
        icons,
        attrs: {
            class: 'ui-icon',
            'stroke-width': 1.9,
            'aria-hidden': 'true'
        }
    });
};

const syncSidebarSubmenuAccessibility = (shell) => {
    const isCollapsed = shell.classList.contains('rdv-page--sidebar-collapsed');

    shell.querySelectorAll('[data-sidebar-submenu]').forEach((group) => {
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

const initDisabledLinks = (root = document) => {
    root.querySelectorAll('[data-disabled-link]').forEach((link) => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
        });
    });
};

const initSidebar = () => {
    const shell = document.querySelector('[data-dashboard-shell]');

    if (!shell) {
        return;
    }

    const toggle = shell.querySelector('[data-sidebar-toggle]');

    if (toggle) {
        toggle.addEventListener('click', () => {
            const isCollapsed = shell.classList.toggle('rdv-page--sidebar-collapsed');

            syncSidebarSubmenuAccessibility(shell);

            toggle.setAttribute('aria-expanded', String(!isCollapsed));
            toggle.setAttribute(
                'aria-label',
                isCollapsed ? 'Ouvrir le menu' : 'Réduire le menu'
            );
        });
    }

    shell.querySelectorAll('[data-sidebar-submenu-toggle]').forEach((submenuToggle) => {
        submenuToggle.addEventListener('click', (event) => {
            event.preventDefault();

            const group = submenuToggle.closest('[data-sidebar-submenu]');

            if (!group) {
                return;
            }

            const isOpen = group.classList.toggle('is-open');
            submenuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            syncSidebarSubmenuAccessibility(shell);
        });
    });

    initDisabledLinks(shell);
    syncSidebarSubmenuAccessibility(shell);
};

const initRdvToggle = () => {
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

const modalCloseTimers = new WeakMap();

const getModalBodyClass = (modalId) => `has-${modalId}`;

const getModalOverlay = (modalId) => (
    document.querySelector(`[data-modal-overlay][data-modal-id="${modalId}"]`)
    || document.querySelector(`[data-${modalId.replace('-modal', '')}-modal]`)
);

const openModal = (modalId) => {
    const modalOverlay = getModalOverlay(modalId);

    if (!modalOverlay) {
        return;
    }

    window.clearTimeout(modalCloseTimers.get(modalOverlay));
    modalOverlay.hidden = false;
    document.body.classList.add('has-modal-open', getModalBodyClass(modalId));

    window.requestAnimationFrame(() => {
        modalOverlay.classList.add('is-open');
        modalOverlay.querySelector('[data-modal-close]')?.focus();
    });
};

const closeModal = (modalOverlay) => {
    if (!modalOverlay) {
        return;
    }

    const modalId = modalOverlay.dataset.modalId
        || (modalOverlay.matches('[data-historique-modal]') ? 'historique-modal' : 'payment-modal');

    modalOverlay.classList.remove('is-open');
    document.body.classList.remove(getModalBodyClass(modalId));

    const closeTimer = window.setTimeout(() => {
        modalOverlay.hidden = true;

        if (!document.querySelector('[data-modal-overlay].is-open')) {
            document.body.classList.remove('has-modal-open');
        }
    }, 220);

    modalCloseTimers.set(modalOverlay, closeTimer);
};

const initModals = () => {
    document.querySelectorAll('[data-modal-open]').forEach((button) => {
        button.addEventListener('click', () => {
            openModal(button.dataset.modalOpen);
        });
    });

    document.querySelectorAll('[data-open-historique-modal]:not([data-modal-open])').forEach((button) => {
        button.addEventListener('click', () => openModal('historique-modal'));
    });

    document.querySelectorAll('[data-open-payment-modal]:not([data-modal-open])').forEach((button) => {
        button.addEventListener('click', () => openModal('payment-modal'));
    });

    document.querySelectorAll('[data-modal-overlay]').forEach((modalOverlay) => {
        modalOverlay.querySelectorAll('[data-modal-close], [data-close-historique-modal], [data-close-payment-modal]').forEach((button) => {
            button.addEventListener('click', () => closeModal(modalOverlay));
        });

        modalOverlay.addEventListener('click', (event) => {
            if (event.target === modalOverlay) {
                closeModal(modalOverlay);
            }
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') {
            return;
        }

        document.querySelectorAll('[data-modal-overlay].is-open').forEach(closeModal);
    });
};

const boot = () => {
    initIcons();
    initSidebar();
    initRdvToggle();
    initModals();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
} else {
    boot();
}
