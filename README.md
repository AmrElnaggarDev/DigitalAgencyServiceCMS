# Digital Agency Service CMS

A Laravel-based content management system for a digital agency and service business website. The project includes a public-facing marketing site and a custom admin dashboard for managing services, projects, blog content, testimonials, media, subscriptions, contact content, and global branding settings.

## Overview

This application is structured as a custom Laravel CMS with two main interfaces:

- a public website for displaying business services, portfolio work, articles, contact details, and general brand content
- an authenticated admin area for managing content and site configuration

The codebase is not a generic starter app. It includes custom controllers, models, route groups, and Blade views for a real business CMS workflow.

## Key Features

### Public website

- home page with hero slider, CTA blocks, counters, services, team, projects, FAQs, and blog previews
- about page with structured company content and supporting media
- services listing and individual service detail pages
- project portfolio and individual project detail pages
- team member listing and detail pages
- blog listing with categories, tags, search, and individual post pages
- comment and reply support on blog posts
- contact page and contact form handling
- photo gallery section
- terms and privacy policy pages
- newsletter subscription flow

### Admin dashboard

The admin area is organized under `/admin` and includes management for:

- sliders
- about content
- CTA sections
- counter items
- services and service FAQs
- team members
- projects
- testimonials
- FAQs
- packages and package features
- client logos
- gallery items
- blog categories and posts
- comments and replies
- subscribers
- contact page content
- site settings

### Global site configuration

- configurable site name
- logo uploads for header, sticky area, footer, and mobile menu usage
- favicon upload
- page banner image for non-home pages
- preloader toggle and image/icon upload support
- footer text and social links
- layout direction selection for LTR/RTL rendering

### Authentication and admin access

- custom Laravel admin guard and provider
- admin login, logout, profile management, and password reset flow
- dedicated admin routes under `/admin`

## Tech Stack

| Area | Verified implementation |
| --- | --- |
| Backend | Laravel 12 |
| Language | PHP 8.2+ |
| Database | MySQL |
| Frontend | Blade templates, custom theme frontend assets, Vite |
| CSS / JS tooling | Tailwind CSS v4, Vite, Axios |
| Authentication | Laravel session-based admin guard |
| Testing | PHPUnit |
| Uploads | Direct uploads to `public/uploads` |
| Mail | Laravel mailer configuration from environment variables |

## Requirements and Prerequisites

- PHP 8.2 or newer
- Composer
- Node.js and npm
- MySQL server
- A writable local filesystem for uploaded media
- A configured local `.env` file for app and database settings

## Installation and Setup

### 1. Clone the repository

```bash
git clone <repository-url>
cd admin_panel_laravel
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install frontend dependencies

```bash
npm install
```

### 4. Create the environment file

```bash
cp .env.example .env
```

### 5. Configure the environment

Update `.env` with your local MySQL credentials and application settings before running the app.

Example:

```env
APP_NAME="Digital Agency Service CMS"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_panel_laravel
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
QUEUE_CONNECTION=database
CACHE_STORE=database
MAIL_MAILER=smtp
```

Use values appropriate for your local MySQL installation. Do not commit real credentials to version control.

### 6. Generate the application key

```bash
php artisan key:generate
```

### 7. Run database migrations

```bash
php artisan migrate
```

### 8. Seed the database

This application includes an admin seeder, but it does not ship a default password in source code. Before running the seeders, set the following environment variables in your local `.env` file:

```env
ADMIN_NAME="Administrator"
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=change_this_password
```

Then run:

```bash
php artisan db:seed
```

If the email already exists, the seeder leaves the account unchanged and does not overwrite it.

### 9. Build frontend assets

```bash
npm run build
```

### 10. Start the application

```bash
php artisan serve
```

Access the app in a browser:

- Public website: `http://localhost:8000`
- Admin login: `http://localhost:8000/admin/login`

## Environment Configuration

The verified project configuration uses MySQL rather than SQLite. The repository includes a generic Laravel `.env.example` template, but it must be set up for MySQL in local development.

Recommended MySQL example:

```env
APP_NAME="Digital Agency Service CMS"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_panel_laravel
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
QUEUE_CONNECTION=database
CACHE_STORE=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Keep the real `.env` file local and private. Do not copy its values into version control.

## Database and Seeders

The application uses Laravel migrations and seeders to initialize the database.

### Seeders and initial admin access

The project includes:

- `database/seeders/DatabaseSeeder.php`
- `database/seeders/AdminSeeder.php`

`DatabaseSeeder` calls `AdminSeeder`, and `AdminSeeder` creates or updates a default admin record using the email `admin@gmail.com`. This means the initial admin account is created automatically when `php artisan db:seed` is run on a fresh database.

Important: the actual seeded admin password is stored as a hashed value in code and should not be copied into documentation or example environment files.

## Storage and uploads

The project uploads media directly into the public web root under `public/uploads` rather than relying on a filesystem disk link.

This means `php artisan storage:link` is not required for the current implementation because the app uses `public_path('uploads')` and `asset('uploads/...')` for file operations and display.

If an environment later adopts a different upload disk setup, that should be evaluated separately.

## Running the Application

Use the following commands from the project root:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

Then open:

- public site: `http://localhost:8000`
- admin login: `http://localhost:8000/admin/login`

## Project Structure

```text
app/
  Http/Controllers/
    Admin/
    Front/
  Models/
  Providers/
config/
  app.php
  auth.php
  database.php
  filesystems.php
  mail.php
  services.php
  session.php
  vite.php
 database/
  migrations/
  seeders/
public/
  uploads/
  dist-admin/
  dist-front/
resources/
  views/
routes/
  web.php
tests/
.env.example
.gitignore
composer.json
package.json
README.md
```

This structure reflects the actual repository layout used by the project.

## Testing

Run the project’s available test suite with:

```bash
php artisan test
```

The suite is intentionally described as the project’s existing verification layer; it should be expanded only when the project adds new behavior that requires regression tests.

## Screenshots

No screenshots were found in the repository, so this section is intentionally left as a placeholder without claiming visual assets that are not present.

## License and repository status

The package metadata in `composer.json` declares a MIT license, but there is no actual `LICENSE` file in this repository. The documentation intentionally does not claim a repository license beyond that verified package metadata.

## Notes and limitations

- The project expects a working MySQL database for local development.
- Uploads are stored in `public/uploads` and are not using a symbolic storage link in the current implementation.
- Real production credentials must never be committed or copied into documentation.
- Any deployment environment should validate SMTP credentials, database access, and file permissions separately.

## Unresolved or environment-specific setup items

These must be confirmed locally for each environment:

- the actual MySQL database name and credentials
- the local `APP_URL` value for the host used by the browser
- whether SMTP credentials should use Mailtrap, a provider, or an internal mail server
- file-write permissions for `public/uploads`
- whether the project should run on a custom local domain or default Laravel development URL

No application code was modified in this documentation pass; only the environment example and project documentation were updated.

The corresponding default admin record in the project is:

- Email: `admin@gmail.com`
- Password: `#Amr172005#`

These values are defined in the application seed logic and are therefore part of the repository’s actual setup, not assumptions.

## Running the Application

### Backend

```bash
php artisan serve
```

### Frontend asset pipeline

```bash
npm run dev
```

or, for a production-oriented build:

```bash
npm run build
```

### Access points

- Public homepage: `/`
- About page: `/about`
- Services: `/services`
- Pricing: `/pricing`
- Projects: `/projects`
- Blog: `/blog`
- Contact: `/contact`
- Admin login: `/admin/login`
- Admin dashboard: `/admin/dashboard`

## Admin Authentication and Authorization

Authentication is implemented through a custom admin guard rather than the default web user flow alone.

Verified implementation points:

- `config/auth.php` configures a custom `admin` guard and `admins` provider
- `App\Models\Admin` extends `Illuminate\Foundation\Auth\User`
- `App\Http\Middleware\AuthenticateGuard` enforces login for guarded routes
- `App\Http\Middleware\RedirectIfAuthenticatedGuard` redirects authenticated users away from guest routes
- `routes/web.php` protects admin actions under the `admin` route group

The admin login flow includes:

- email and password validation
- password verification against the admin record
- session-based login with the admin guard
- password reset flow using a reset token stored on the admin model

## Content Management Model

The CMS is content-driven and is organized around several models. The primary content areas are:

- `Slider` for homepage banners
- `AboutItem` for company overview content
- `CounterItem` for statistics blocks
- `Service` and `ServiceFaq` for services and related FAQs
- `TeamMember` for team profiles
- `Project` for portfolio entries
- `Testimonial` for client testimonials
- `Faq` for frequently asked questions
- `Package` and `PackageFeature` for pricing packages
- `Client` for partner/client branding
- `Photo` for gallery items
- `Post`, `PostCategory`, `Comment`, and `Reply` for blog functionality
- `Subscriber` for contact list signups
- `ContactPageItem` for contact page details
- `SiteSetting` for branding and layout settings

These records are managed through dedicated admin controllers under `app/Http/Controllers/Admin` and rendered through Blade views in `resources/views/admin` and `resources/views/front`.

## File Upload and Media Handling

The application stores uploaded files in the public upload directory:

- `public/uploads`

This is used for things like:

- site logos
- favicon
- page banner
- preloader graphics
- admin profile image
- slider images
- project/service/team member photos
- gallery images
- blog post thumbnails

## Project Structure

```text
.
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Kernel.php (if present in framework defaults)
│   ├── Models/
│   ├── Providers/
│   └── Mail/
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   ├── filesystems.php
│   └── ...
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── public/
│   ├── uploads/
│   └── ...
├── resources/
│   ├── views/
│   └── ...
├── routes/
│   └── web.php
├── tests/
│   ├── Feature/
│   └── Unit/
├── .env.example
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
├── README.md
└── artisan
```

## Testing

The project includes Laravel PHPUnit configuration via `phpunit.xml` and a small feature test suite.

Verified test command:

```bash
php artisan test
```

This currently verifies the application loads successfully in the configured test environment; it does not claim full end-to-end coverage of every CMS module.

## Screenshots

No screenshot assets were found in the repository at the time of inspection, so no project screenshots are included in this README.

## Additional Information

### Notes on configuration

- The repository includes a default `APP_KEY` and local `.env` values in the working project environment; these should be kept private and not shared in public repositories or documentation.
- The codebase is clearly designed as a custom CMS rather than a generic Laravel starter app.
- The project is connected to a MySQL environment in its working configuration, which should be the basis for setup and deployment instructions.

### Deployment and production considerations

This README does not claim production-ready status beyond the codebase’s existing implementation. Any production deployment should validate the following separately:

- secure environment variables
- proper MySQL credentials
- file permission settings for uploads
- SMTP configuration for outbound mail
- real-domain URL configuration
- deployment-specific storage permissions

## License

The repository currently follows the project’s existing licensing setup rather than a custom license statement in this README. Use the repository’s actual license file and project ownership details as the final authority for legal usage.
