# BELOG AJUM — Laravel 12

A team introduction website with a black, maroon, and gold theme. It includes a home page and a dynamic profile page for each member. The English edition preserves the supplied member names, student IDs, photos, existing English biographies, and URL identifiers.

## 1. Running on Windows (PowerShell or VS Code terminal)

Requirements: PHP compatible with Laravel 12 and Composer. Check `php -v` and `composer -V`. Enable the PHP extensions required by Laravel, including ctype, curl, dom, fileinfo, filter, hash, mbstring, openssl, pcre, pdo, session, tokenizer, and xml. Enable zip in php.ini for Composer downloads.

Extract the ZIP and open the folder containing `artisan` and `composer.json`, for example:

```powershell
cd C:\b.project.id\webframwork_tugas1
composer install
php artisan view:clear
php artisan config:clear
php artisan serve
```

Open http://127.0.0.1:8000. Stop the server with Ctrl+C.

The uploaded project already includes an `.env`, vendor dependencies, a Composer lock file, and a SQLite database. Keep your existing environment settings and application key. Only for a fresh installation without an `.env` file, run:

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

On Linux/macOS, use `cp .env.example .env` instead of `Copy-Item`. Do not run `composer create-project` in this populated folder. Team data comes from config/team.php. Database use for sessions or caching depends on your `.env` settings. The team pages use public CSS and JavaScript assets and do not require a Vite build.

## 2. Commonly edited files

| File | Purpose |
| --- | --- |
| config/team.php | Website name, class, course, member details, student IDs, roles, biographies, skills, mottos, photo paths, copyright |
| public/css/style.css | Colors, spacing, typography, responsive layouts, animations |
| resources/views/team/index.blade.php | Home page layout and text |
| resources/views/team/show.blade.php | Member profile page |
| resources/views/layouts/app.blade.php | Shared header, navigation, and footer |
| routes/web.php | URLs and route names |
| app/Http/Controllers/TeamController.php | Data selection and view rendering |
| public/js/app.js | Keyboard focus support for internal links |

## 3. Editing members and photos

Edit `config/team.php`. Change `name`, `initials`, `nim`, `role`, `bio`, `story`, `skills`, and `motto` as needed. Keep student IDs as quoted strings. Use a unique slug containing lowercase letters, numbers, or hyphens, such as `wulan-ade`. The profile URL becomes `/anggota/wulan-ade`. The `focus` field is no longer used by the supplied profile view.

Place photos in `public/images/members/`, then set the matching path:

```php
'photo' => 'images/members/wulan.jpg',
```

Use JPG, PNG, or WebP, ideally a portrait image around 800 × 1000 pixels. Do not include `public/` at the start of the path. Match the filename and extension exactly, including uppercase and lowercase letters on case-sensitive servers. Use `null` to display initials instead of a photo.

To add a member, duplicate a member array and assign a unique slug. Cards and the member count update automatically. To remove a member, delete that array and adjust commas where needed.

If changes do not appear, run `php artisan config:clear` and `php artisan view:clear`, then reload the browser with Ctrl+F5.

## 4. Colors and application flow

The final CSS overrides in public/css/style.css use:
- `--bg: #000000` for the main background.
- `--panel: #100d0e` for card backgrounds.
- `--maroon: #541c2b` for accent panels.
- `--gold: #e7c58b` for gold accents.
- `--text: #fff6e9` for primary text.

Flow: URL → routes/web.php → TeamController → config/team.php → Blade → browser page. Blade `{{ }}` escapes displayed text. Unknown member slugs return a 404 page. These team pages do not provide an admin panel or browser-based photo uploads.

## 5. Checks after installation

```powershell
php artisan route:list
php artisan view:cache
```

Open the home page, all three member profiles, and the About/Team links. Check `/anggota/not-found` returns 404. Review the layout on desktop and mobile. The original `/anggota/` route and `#anggota`/`#tentang` anchors are retained for compatibility even though their visible labels are English.

## 6. Moving the pages into an existing Laravel 12 project

Back up the project first. Copy config/team.php, TeamController, the layouts/team views and errors/404.blade.php, CSS, JavaScript, favicon, and member images. Merge routes/web.php without duplicating the GET `/` route. Use SESSION_DRIVER=file and CACHE_STORE=file if you do not want database-backed sessions or cache. Clear configuration and view caches. Do not overwrite the existing `.env`.

## 7. Hosting

Use hosting with PHP/Laravel support. Point the document root to `public`. Set APP_ENV=production, APP_DEBUG=false, and APP_URL to the actual domain. Keep `.env` private and make storage and bootstrap/cache writable. Run `composer install --no-dev --optimize-autoloader` and `php artisan optimize`. Static hosting cannot run the PHP application.

## Translation notes

The website text, accessibility labels, app locale, project comments, and this guide are in English. Existing English biographies and placeholders remain unchanged. Framework dependencies, Git history, database records, and historical logs are not translated. Compiled Blade view caches were removed so Laravel can regenerate the English pages. Source-level checks were performed; Laravel execution was not tested in the translation environment.

References: https://laravel.com/docs/12.x/installation and https://laravel.com/docs/12.x/releases
