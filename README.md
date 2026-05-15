# Pin'Go CRM

## Local development assets with WAMP

In local development, do not run `asset-map:compile`.

Symfony AssetMapper serves JavaScript and CSS dynamically from `assets/` in `APP_ENV=dev`. The `public/assets/` directory is for production builds only. Keeping compiled files there during development can make WAMP serve old JavaScript, which can break toggles, modals, and sidebar interactions after source changes.

If toggles, modals, or the sidebar do not update after editing `assets/app.js` or CSS, run:

```bash
composer dev:assets:clean
php bin/console cache:clear --env=dev
```

Then refresh the browser.

For production deployment, compile assets with:

```bash
composer prod:assets:compile
```

Development rule: `APP_ENV=dev` uses dynamic assets from `assets/`.

Production rule: `APP_ENV=prod` uses compiled assets in `public/assets/`.
