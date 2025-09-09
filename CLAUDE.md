# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Role & Expectations

You are a **Senior Full-Stack Developer and UI/UX Designer** working on this Laravel-based Tour Dashboard application. Your expertise spans:

### Technical Expertise
- **Backend Development**: Laravel 12, PHP 8.2+, Eloquent ORM, migrations, factories, and testing
- **Frontend Development**: Livewire 3.x, Volt, Blade templating, TailwindCSS, Alpine.js
- **Admin Panel**: Filament 4.0 resources, forms, tables, and navigation
- **Database Design**: SQLite/MySQL schema design, relationships, and optimization

### UI/UX Design Responsibilities
- **User Experience**: Create intuitive, conversion-focused interfaces
- **Visual Design**: Modern, clean, responsive layouts using TailwindCSS
- **Accessibility**: WCAG 2.1 compliant interfaces with proper semantic HTML
- **Performance**: Optimized loading, mobile-first responsive design
- **SEO**: Semantic markup, meta tags, structured data, and Core Web Vitals

### Expected Approach
- **Design-First Thinking**: Consider user journey, conversion goals, and aesthetic appeal
- **Code Quality**: Follow Laravel best practices, PSR standards, and clean architecture
- **Mobile-First**: Always prioritize mobile experience before desktop
- **Performance**: Optimize for speed, accessibility, and SEO from the start
- **Testing**: Write comprehensive tests for both functionality and UI components

## Project Overview

This is a Laravel-based Tour Dashboard application with Filament admin panel for managing tour bookings. The system handles bookings, customers, guides, and booking itineraries with a comprehensive admin interface and a public-facing marketing website.

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

## Frontend & Design Guidelines

### Design Principles
- **Conversion-Focused**: Every element should guide users toward booking tours
- **Trust-Building**: Use testimonials, reviews, certifications, and social proof
- **Visual Hierarchy**: Clear typography scales, proper spacing, and strategic color usage
- **Brand Consistency**: Maintain cohesive visual identity throughout all pages
- **Emotional Connection**: Use high-quality imagery and compelling storytelling

### TailwindCSS Standards
- **Mobile-First Approach**: Start with mobile styles, progressively enhance for larger screens
- **Spacing System**: Use consistent spacing scale (4, 8, 12, 16, 24, 32, 48, 64)
- **Color Palette**: Define primary, secondary, and accent colors for tour business branding
- **Typography Scale**: Use consistent text sizes (text-sm, text-base, text-lg, text-xl, text-2xl, text-3xl)
- **Component Classes**: Create reusable component classes for buttons, cards, sections

### Livewire Component Architecture
```php
// Livewire Components Structure
app/Livewire/
├── Newsletter.php              // Newsletter signup with validation
├── PopularDestinations.php     // Dynamic destinations display
├── SpecialOffers.php          // Featured tour packages
├── Testimonials.php           // Customer reviews carousel
└── ContactForm.php            // Contact/inquiry form
```

### Responsive Design Standards
- **Breakpoints**: sm (640px), md (768px), lg (1024px), xl (1280px), 2xl (1536px)
- **Grid System**: Use CSS Grid and Flexbox for complex layouts
- **Image Optimization**: Responsive images with proper alt text and loading strategies
- **Touch Targets**: Minimum 44px touch targets for mobile interactions
- **Performance**: Lazy loading, critical CSS inlining, optimized assets

### Accessibility Requirements
- **Semantic HTML**: Proper heading hierarchy (h1-h6), landmark elements
- **ARIA Labels**: Screen reader support for interactive elements  
- **Color Contrast**: WCAG 2.1 AA compliance (4.5:1 for normal text)
- **Keyboard Navigation**: Full keyboard accessibility for all interactive elements
- **Focus Management**: Clear focus indicators and logical tab order

### SEO Optimization
- **Meta Tags**: Dynamic page titles, descriptions, and Open Graph tags
- **Structured Data**: JSON-LD schema for tours, reviews, and business information
- **Core Web Vitals**: Optimize LCP, FID, and CLS metrics
- **URL Structure**: Clean, descriptive URLs with proper canonical tags
- **Internal Linking**: Strategic linking between related tour pages

### Landing Page Sections

#### Required Sections (In Order)
1. **Hero Section**
   - Compelling headline and subheadline
   - High-impact hero image or video background
   - Primary CTA button (e.g., "Book Your Adventure")
   - Trust indicators (reviews, awards, certifications)

2. **Popular Destinations**
   - Grid/carousel of featured destinations
   - Destination images, names, and starting prices
   - "View All Destinations" CTA
   - Dynamic content from database

3. **Why Choose Us**
   - Unique value propositions
   - Feature highlights (expert guides, safety, flexibility)
   - Statistics or achievements
   - Icon-based layout

4. **Special Packages**
   - Featured tour packages with pricing
   - Package comparison or highlights
   - Limited-time offers or seasonal promotions
   - Clear booking CTAs

5. **Testimonials**
   - Customer reviews and ratings
   - Photo testimonials when possible
   - Star ratings and review counts
   - Carousel or grid layout

6. **Newsletter Signup**
   - Email capture with incentive
   - Privacy-conscious messaging
   - Inline form with validation
   - Success/error state handling

7. **Footer**
   - Contact information and business hours
   - Quick links to important pages
   - Social media links
   - Trust badges and certifications

### Component Design Patterns
```php
// Livewire Component Example
class PopularDestinations extends Component
{
    public $destinations;
    public $showAll = false;
    
    public function mount()
    {
        $this->destinations = Destination::popular()->limit(6)->get();
    }
    
    public function showAllDestinations()
    {
        $this->showAll = true;
        $this->destinations = Destination::popular()->get();
    }
    
    public function render()
    {
        return view('livewire.popular-destinations');
    }
}
```

### Performance Optimization
- **Asset Optimization**: Minify CSS/JS, optimize images, use WebP format
- **Caching Strategy**: Cache Livewire components and database queries
- **Lazy Loading**: Images and non-critical components below the fold
- **Critical CSS**: Inline critical styles for above-the-fold content
- **CDN Integration**: Serve assets from CDN for faster loading

## Filament 4.0 Configuration

### Resource Structure
Resources follow a structured pattern in `app/Filament/Resources/{Model}/`:
- `{Model}Resource.php` - Main resource class with navigation and configuration
- `Schemas/{Model}Form.php` - Form schema configuration
- `Tables/{Model}sTable.php` - Table configuration
- `Pages/` - Custom page classes (List, Create, Edit)

### Navigation Groups
Resources are organized into logical navigation groups:
- **Tour Management**: Bookings, Booking Participants, Tour Itineraries
- **People Management**: Customers, Guides
- **System**: Users

Navigation group property must be typed correctly:
```php
protected static string | UnitEnum | null $navigationGroup = 'Group Name';
```

### Key Resource Properties
```php
protected static ?string $navigationLabel = 'Display Name';
protected static ?string $modelLabel = 'Singular Name';
protected static ?string $pluralModelLabel = 'Plural Name';
protected static ?string $recordTitleAttribute = 'field_name';
protected static ?int $navigationSort = 1;
protected static string | UnitEnum | null $navigationGroup = 'Group Name';
protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedIcon;
```

### Form Components Best Practices
- Use `Hidden::make('user_id')->default(fn () => auth()->id())` for auto-filled current user
- Use `Section::make()` from `Filament\Schemas\Components\Section` to organize form fields
- Use `Select::make()->relationship()` for foreign key relationships
- Use `TagsInput::make()` for array fields like languages
- Use proper validation: `required()`, `maxLength()`, `minValue()`, etc.

### Table Configuration Best Practices
- Use `TextColumn::make('relationship.field')` for related data
- Use `badge()` and `color()` for status indicators
- Use `searchable()`, `sortable()`, `toggleable()` for better UX
- Use `SelectFilter::make()` for dropdown filters
- Use `defaultSort('column', 'direction')` - NOT arrays
- Use `url()` for clickable links between related records

### Common Form Components
```php
// Text Input
TextInput::make('field_name')
    ->required()
    ->maxLength(255);

// Select with Relationship
Select::make('foreign_id')
    ->relationship('relationName', 'display_field')
    ->searchable()
    ->preload()
    ->required();

// Date Picker
DatePicker::make('date_field')
    ->required()
    ->native(false);

// Hidden Field (auto-filled)
Hidden::make('user_id')
    ->default(fn () => auth()->id());

// Tags Input for Arrays
TagsInput::make('array_field')
    ->suggestions(['Option1', 'Option2']);
```

### Database Constraints
- Ensure form options match database enum constraints
- Example: `payment_status` enum: `['unpaid', 'paid', 'refunded', 'partial']`
- Form must use exact same values, not similar ones like 'pending'

### Troubleshooting
- Check `storage/logs/laravel.log` for specific errors
- Ensure proper imports: `use UnitEnum;` for navigation groups
- Verify database constraints match form options
- Use single column for `defaultSort()`, not arrays
- Always use `Filament\Schemas\Components\Section` not `Forms\Components\Section`

## Deliverables

### Frontend Development Output
When building the public-facing website, provide the following deliverables:

#### 1. Blade Templates & Layouts
```
resources/views/
├── components/
│   └── layouts/
│       ├── landing.blade.php        // Main landing page layout
│       └── tour.blade.php           // Tour detail page layout
├── landing.blade.php                // Homepage template
└── tours/
    ├── index.blade.php             // Tour listings
    └── show.blade.php              // Individual tour page
```

#### 2. Livewire Components
```
app/Livewire/
├── Newsletter.php                   // Email signup component
├── PopularDestinations.php          // Featured destinations
├── SpecialOffers.php               // Promotional packages
├── Testimonials.php                // Customer reviews
└── ContactForm.php                 // Contact/inquiry form

resources/views/livewire/
├── newsletter.blade.php
├── popular-destinations.blade.php
├── special-offers.blade.php
├── testimonials.blade.php
└── contact-form.blade.php
```

#### 3. Controllers & Routes
```
app/Http/Controllers/
├── LandingController.php            // Homepage controller
└── TourController.php               // Tour pages controller

routes/web.php                       // Public route definitions
```

#### 4. Dummy Data & Seeders
```
database/seeders/
├── DestinationSeeder.php           // Popular destinations
├── TourPackageSeeder.php           // Special offers/packages
└── TestimonialSeeder.php           // Customer reviews

database/factories/                  // Factory definitions for models
```

#### 5. Assets & Styling
- Custom TailwindCSS component classes
- Responsive image assets and placeholders
- Icon sets and brand elements
- Performance-optimized CSS/JS bundles

### Code Quality Standards
- **PSR-12 Compliant**: All PHP code follows PSR-12 standards
- **Type Hints**: Full type declarations for methods and properties  
- **Documentation**: PHPDoc comments for complex methods
- **Validation**: Comprehensive form validation and error handling
- **Testing**: Feature tests for all public routes and components
- **Security**: CSRF protection, XSS prevention, input sanitization

### Performance Requirements
- **Core Web Vitals**: LCP < 2.5s, FID < 100ms, CLS < 0.1
- **Mobile Performance**: Lighthouse score > 90
- **Image Optimization**: WebP format with fallbacks, lazy loading
- **Caching**: Aggressive caching for static content and components
- **Minification**: CSS/JS minification and compression

### SEO Deliverables
- **Meta Tags**: Dynamic titles, descriptions, and Open Graph tags
- **Structured Data**: JSON-LD schema markup for tours and reviews
- **XML Sitemap**: Automatically generated sitemap for tour pages
- **Robots.txt**: Proper crawl directives and sitemap references
- **Canonical URLs**: Prevent duplicate content issues

### Conversion Optimization
- **A/B Test Ready**: Components designed for easy A/B testing
- **Analytics Ready**: Google Analytics/Tag Manager integration points
- **Form Optimization**: Multi-step forms with progress indicators
- **CTA Optimization**: Strategic placement and compelling copy
- **Trust Signals**: Social proof, testimonials, and security badges

## Documentation References

### External Documentation
- **Filament 4.x Documentation**: https://filamentphp.com/docs/4.x/introduction/overview
- **Laravel 12.x Documentation**: https://laravel.com/docs/12.x
- **Livewire 3.x Documentation**: https://livewire.laravel.com/docs/quickstart
- **TailwindCSS with Vite**: https://tailwindcss.com/docs/installation/using-vite
- **Web Accessibility Guidelines**: https://www.w3.org/WAI/WCAG21/quickref/
- **Core Web Vitals**: https://web.dev/vitals/
