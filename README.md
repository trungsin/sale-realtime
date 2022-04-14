# eBay manager

## Development

    sudo chmod -R 777 storage
    sudo chmod -R 777 bootstrap/cache
    sudo chmod -R 777 public/uploads

    composer install
    composer dump-autoload
    php artisan migrate:fresh --seed

    php artisan clear-compiled
    php artisan ide-helper:generate
    php artisan ide-helper:models -N
    php artisan ide-helper:meta

    npm i
    npm run dev
