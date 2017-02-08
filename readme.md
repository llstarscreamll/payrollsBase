## Setup the app

```bash
php artisan migrate:refresh
php artisan db:seed --class=PayrollsBaseDataSeeder
php artisan db:seed --class=DatabaseSeeder
```