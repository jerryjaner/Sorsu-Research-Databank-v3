# Sorsu Research Databank System v3

A Laravel 12 application built to manage research assets, campus and department metadata, and user access for students and administrators.

## Overview

This system supports:
- public research search by campus and department
- authenticated student access for downloading abstracts and managing profiles
- role-based administrator access for managing campuses, departments, users, roles, permissions, and research records
- PDF abstract and research paper preview/download

## Key Features

- Student homepage with searchable research listings
- Role-based access control using `spatie/laravel-permission`
- Administrator dashboard for managing:
  - research entries
  - campuses and departments
  - user accounts
  - roles and permissions
- Research download and PDF preview support
- Profile update experience for students

## Built With

- PHP 8.2
- Laravel 12
- Tailwind CSS
- Vite
- Alpine.js
- Breeze authentication
- Spatie Laravel Permission

## Installation

1. Clone the repository

```bash
git clone <repo-url>
cd Research-Databank-System-v2
```

2. Install PHP dependencies

```bash
composer install
```

3. Install JavaScript dependencies

```bash
npm install
```

4. Copy the environment file

```bash
cp .env.example .env
```

5. Generate the application key

```bash
php artisan key:generate
```

6. Configure your database settings in `.env`

7. Run database migrations and seeders

```bash
php artisan migrate --seed
```

8. Build front-end assets

```bash
npm run build
```

## Development

Start the development server

```bash
php artisan serve
```

Start Vite in development mode

```bash
npm run dev
```

## Deployment

This repository includes a GitHub Actions workflow at `.github/workflows/hostinger-deploy.yml` that deploys to Hostinger when code is pushed to `main`.

The workflow performs these steps:
- checks out the repository
- installs PHP and Node dependencies
- builds front-end assets with `npm run build`
- connects to Hostinger over SSH
- pulls the latest code on the server
- installs composer dependencies
- runs `php artisan migrate --force`
- syncs the generated `public/build` files to the Hostinger public folder

### Hostinger setup

1. Ensure your Hostinger account has SSH access enabled.
2. Add your site path in the workflow (for example `domains/skyblue-lapwing-383377.hostingersite.com`).
3. Upload your public SSH key to Hostinger and keep the private key in GitHub Secrets.
4. Add these repository secrets in GitHub:
   - `SSH_HOST`
   - `SSH_USERNAME`
   - `SSH_PORT`
   - `SSH_KEY`

### Notes for deployment

- The workflow copies `.env.example` to `.env` during CI, so any runtime environment values should be configured on the server or with real environment files on Hostinger.
- The workflow assumes the site is located at `~/domains/skyblue-lapwing-383377.hostingersite.com` on the Hostinger server.
- If your Hostinger environment uses a global Composer installation, you can update the workflow to use `composer install` instead of `php composer.phar install`.

## Database Seeders

The app seeds initial roles, permissions, and campus data using:
- `RoleSeeder`
- `PermissionSeeder`
- `UserSeeder`
- `CampusSeeder`

Default roles include:
- `super-admin`
- `bulan-admin`
- `sorsogon-admin`
- `castilla-admin`
- `magallanes-admin`
- `graduate-admin`
- `student`

## Routes Summary

Public routes:
- `/` — homepage
- `/search` — research search
- `/departments/{campusId}` — fetch departments for a campus

Student routes (authenticated):
- `/research/download/{id}` — download research abstract
- `/student-profile-account` — profile edit page

Administrator routes (authenticated + admin roles):
- `/dashboard`
- `/roles`, `/permissions`
- `/campuses`, `/college`
- `/user-accounts`
- `/researches`

Authentication routes are registered in `routes/auth.php`.

## Testing

Run the application tests with:

```bash
php artisan test --compact
```

## Useful Scripts

- `composer run setup` — install dependencies, prepare `.env`, run migrations, install JS packages, build assets
- `composer run test` — run the test suite
- `npm run dev` — start Vite development server
- `npm run build` — build production assets

## Notes

- The project uses a custom `research` table for research records.
- Student users are managed separately from administrator accounts and must be assigned the `student` role.
- Administrators require one of the seeded admin role names.

## License

This project is licensed under the MIT License.
