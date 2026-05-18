# Frontend Components Guide

## 1. How `base.html.twig` works

The project uses one global layout:

- `templates/base.html.twig`

It supports two modes:

- auth mode for login pages
- dashboard mode for CRM pages

Dashboard mode provides:

- `dashboard-shell`
- shared sidebar include
- `dashboard-main`
- `dashboard-content`
- `main_content` block

Auth mode provides:

- `auth_content` block
- no dashboard sidebar

Page-specific attributes must be passed through `page_attrs`.

Example:

```php
'page_attrs' => 'data-rdv-page',
```

## 2. How to create a dashboard page

Use:

```twig
{% extends 'base.html.twig' %}

{% block title %}Page Title{% endblock %}

{% block main_content %}
    page-specific content
{% endblock %}
```

Example controller variables:

```php
return $this->render('pages/example/index.html.twig', [
    'active_route' => 'app_example',
    'active_label' => 'Example',
    'page_classes' => 'example-page',
    'main_classes' => 'example-main',
    'content_classes' => 'dashboard-content--example',
]);
```

## 3. How to create an auth page

Use:

```twig
{% extends 'base.html.twig' %}
{% set layout_type = 'auth' %}

{% block auth_content %}
    auth page content
{% endblock %}
```

## 4. How to pass sidebar active state

Supported variables:

- `active_route`
- `active_label`
- `active_submenu`

Example:

```php
return $this->render('pages/consultation/details.html.twig', [
    'active_route' => 'app_consultation_details',
    'active_label' => 'Consultation',
    'active_submenu' => 'Détails de consultation',
]);
```

## 5. How to use `page-header`

Component:

- `templates/components/ui/page-header.html.twig`

Typical usage:

```twig
{% include 'components/ui/page-header.html.twig' with {
    icon: 'contact-round',
    title: 'Gestion des Clients',
    subtitle: 'Ajouter/Modifier/Chercher des Clients',
    action_label: 'Ajouter un Client',
    action_icon: 'plus'
} only %}
```

## 6. How to use `panel`

Component:

- `templates/components/ui/panel.html.twig`

Use it for white framed content cards.

```twig
{% embed 'components/ui/panel.html.twig' with {
    extra_classes: 'example-panel',
    attrs: { 'aria-labelledby': 'example-title' },
    use_body: false
} %}
    {% block content %}
        panel content
    {% endblock %}
{% endembed %}
```

## 7. How to use `table-controls`

Component:

- `templates/components/ui/table-controls.html.twig`

Use it for:

- the "Afficher X éléments" select
- the search field

```twig
{% include 'components/ui/table-controls.html.twig' with {
    extra_classes: 'example-controls',
    per_page: 10,
    per_page_options: [10, 25, 50],
    search_placeholder: 'Rechercher...',
    search_aria_label: 'Rechercher un élément'
} only %}
```

## 8. How to use `pagination`

Component:

- `templates/components/ui/pagination.html.twig`

```twig
{% include 'components/ui/pagination.html.twig' with {
    extra_classes: 'example-pagination'
} only %}
```

## 9. How to use `modal`

Component:

- `templates/components/ui/modal.html.twig`

```twig
{% embed 'components/ui/modal.html.twig' with {
    id: 'example-modal',
    size: 'medium',
    badge_title: 'Example',
    badge_icon: 'info'
} %}
    {% block content %}
        modal content
    {% endblock %}
{% endembed %}
```

## 10. AssetMapper dev/prod rules

Development:

- do not run `asset-map:compile`
- assets are served dynamically from `assets/`
- if stale assets appear, run:

```bash
composer dev:assets:clean
composer dev:cache:clear
```

Production:

- compile assets before deployment

```bash
composer prod:assets:compile
```

## 11. Mock page data architecture

The current prototype keeps business logic out of scope.

Mock page data now lives in:

- `src/Service/Page/RdvPageService.php`
- `src/Service/Page/ClientPageService.php`
- `src/Service/Page/ConsultationListPageService.php`
- `src/Service/Page/ConsultationDetailsPageService.php`

Controllers inject a page service and pass one `page` variable to Twig:

```php
'page' => $pageService->getPageData()
```

Twig templates display `page.*` data instead of owning large mock arrays.

This is still mock data only.
No database, entities, or repositories are implemented yet.
