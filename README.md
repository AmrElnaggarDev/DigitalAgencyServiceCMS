# Digital Agency Service CMS

A Laravel-based content management system for a digital services or agency website. It includes a public front end and an admin dashboard for managing site content, blog posts, services, projects, team members, testimonials, FAQs, subscribers, and global branding settings.

## Overview

This project is built to support a modern agency website with:

- responsive public pages for home, about, services, pricing, projects, team, FAQ, blog, contact, gallery, and legal pages
- admin authentication and secure password reset flow
- global site settings for branding and layout
- media upload support for logos, favicon, banner, and preloader assets
- dynamic blog and comment management
- contact and subscription forms

## Tech Stack

- PHP 8.2+
- Laravel 12
- Blade templating engine
- SQLite or MySQL database support
- Laravel routing, validation, migrations, and seeding
- PHPUnit for automated testing

## Implemented Features

- Admin login and dashboard
- Dashboard statistics for posts, comments, replies, services, projects, team members, testimonials, FAQs, packages, and subscribers
- Global settings panel for:
  - header/footer/mobile logos
  - favicon
  - page banner
  - preloader enable/disable state
  - preloader icon/logo
  - footer text and social links
  - layout direction (LTR/RTL)
- Homepage sliders and marketing sections
- About page configuration
- Services and service FAQs
- Portfolio projects
- Team members and social profiles
- Testimonial management
- Blog with categories, tags, search, comments, and replies
- Subscriber management
- Photo gallery
- Contact page and form email sending

## Project Structure

- `app/` — controllers, models, service providers, and application logic
- `database/migrations/` — database schema migrations
- `database/seeders/` — database seeders, including the default admin user
- `resources/views/` — front-end and admin Blade templates
- `routes/web.php` — route definitions
- `public/uploads/` — uploaded site and media assets
- `tests/` — automated tests

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm (only if you plan to rebuild front-end assets)
- A database such as SQLite or MySQL

## Installation

1. Clone the repository:

   ```bash
   git clone <repository-url>
   cd admin_panel_laravel
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create the environment file:

   ```bash
   cp .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Configure your database in `.env`.

   Example for SQLite:

   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/your/database.sqlite
   ```

   Example for MySQL:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. Run the database migrations and seed the default admin account:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. If front-end assets need rebuilding locally, install Node dependencies and build them:

   ```bash
   npm install
   npm run build
   ```

## Running the Project

Start the local development server:

```bash
php artisan serve
```

Then open:

- Front end: `http://localhost:8000`
- Admin login: `http://localhost:8000/admin/login`

Default seeded admin login:

- Email: `admin@gmail.com`
- Password: `#Amr172005#`

## Environment Notes

- Keep your `.env` file private and do not commit it to source control.
- Uploaded media files are stored in `public/uploads/`.
- Ensure your hosting environment can write to the uploads directory with the correct file permissions.

## Testing

Run the available tests:

```bash
php artisan test
```

## License

This project currently follows the repository's existing licensing setup and is intended for portfolio/demo use unless otherwise specified by the project owner.
