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
    WalletCards
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
    WalletCards
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

const boot = () => {
    renderIcons();
    initRdvSidebar();
    initRdvPanelToggle();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
} else {
    boot();
}
