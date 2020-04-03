## Dashboard for laravel Apps

### Configuration

Export the config file executing:

```bash
php artisan vendor:publish --tag=laravel-dash:config
```

### Customizing views

Export all view files:

```bash
php artisan vendor:publish --tag=laravel-dash:views
```

Export only layout views:

```bash
php artisan vendor:publish --tag=laravel-dash:layout-views
```

Export only auth views:

```bash
php artisan vendor:publish --tag=laravel-dash:auth-views
```