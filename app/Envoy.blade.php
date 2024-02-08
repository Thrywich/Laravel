@servers(['web' => ['aurelien-thierry@13.39.150.46'], 'workers' => ['aurelien-thierry@13.39.150.46']])

@task('maintenance', ['on' => 'workers'])
    composer install
    composer update
    npm install
    npm run build
    php artisan migrate --force
    composer install --optimize-autoloader --no-dev
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
@endtask