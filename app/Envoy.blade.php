@servers(['web' => ['aurelien-thierry@13.39.150.46']])

@task('deploy', ['on' => 'web'])
    cd ./aurelien-thierry.dhonnabhain.me
    git checkout production
    git pull
    cd ./app
    composer install
    composer update
    npm install
    npm run build
    php artisan migrate --force
    composer install --optimize-autoloader --no-dev
    php artisan optimize:clear
    php artisan optimize
@endtask