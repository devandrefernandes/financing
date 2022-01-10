# financing

### Instalação
```
cd api

.env connection
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=financing
DB_USERNAME=financing_user
DB_PASSWORD=financing_pass

composer install
docker-compose up -d
docker exec -it financing-app bash

php artisan migrate:install
php artisan migrate
php artisan db:seed

php artisan key:generate
php artisan cache:clear
php artisan config:clear
```
