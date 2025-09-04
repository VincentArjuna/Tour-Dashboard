# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel-based Tour Dashboard application with Filament admin panel for managing tour bookings. The system handles bookings, customers, guides, and booking itineraries with a comprehensive admin interface.

## Development Commands

### Development Environment
- `composer run dev` - Start full development environment (server, queue, logs, and vite)
- `php artisan serve` - Start Laravel development server only
- `npm run dev` - Start Vite development server for assets

### Testing and Code Quality
- `composer run test` - Run all tests (clears config and runs `php artisan test`)
- `php artisan test` - Run PHP tests using Pest
- `./vendor/bin/pint` - Format PHP code (Laravel Pint)

### Database Management
- `php artisan migrate` - Run database migrations
- `php artisan migrate:fresh` - Drop all tables and re-run migrations
- `php artisan migrate:rollback` - Rollback last migration
- `php artisan migrate:status` - Show migration status

### Queue and Background Jobs
- `php artisan queue:listen --tries=1` - Start queue worker (development)
- `php artisan queue:work` - Process queue jobs as daemon
- `php artisan pail --timeout=0` - Tail application logs

### Filament Resources
- `php artisan make:filament-resource ModelName` - Create new Filament resource
- `php artisan make:filament-page PageName` - Create new Filament page
- `php artisan filament:upgrade` - Upgrade Filament components

## Architecture

### Core Models and Relationships
- **Booking**: Central entity linking Users, Guides, Customers, and BookingItineraries
- **User**: System users with authentication
- **Guide**: Tour guides with profile information
- **Customer**: Tour participants linked through pivot table
- **BookingCustomer**: Pivot table connecting Bookings and Customers
- **BookingItinerary**: Individual itinerary items per booking

### Filament Admin Structure
All Filament resources follow a structured pattern:
- `app/Filament/Resources/{Model}/` - Resource directory per model
- `{Model}Resource.php` - Main resource class
- `Schemas/{Model}Form.php` - Form schema configuration
- `Tables/{Model}sTable.php` - Table configuration
- `Pages/` - Custom page classes (List, Create, Edit)

### Key Technologies
- **Laravel 12** with PHP 8.2+
- **Filament 4.0** for admin panel
- **Livewire/Volt** for reactive components
- **Pest** for testing framework
- **SQLite** for database (development)
- **Vite** for asset compilation
- **Tailwind CSS** for styling

### Database Configuration
- Uses SQLite by default for development
- Queue and cache drivers set to database
- Sessions stored in database

### Security
- Filament Shield installed for role-based permissions
- User authentication via Laravel's built-in system