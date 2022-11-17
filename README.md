# home-care

## create process

### start docker

- 'docker-compose -up -d'
- environment: php 8.1, npm 19.0, php 8.0, composer 2.4.4, nginx stable-alpine.

### install vue 3 with vue cli

- 'vue create -n front-end'

### install laravel 9 with composer

- 'composer create-project laravel/laravel back-end' with php 8.1
- or 'docker-compose run composer composer create-project laravel/laravel .'
- if have errors "Failed to open stream:" then 'php artisan cache:clear' 'chmod -R 777 storage/' 'composer dump-autoload'
- setup file .env: APP_URL=<http://localhost:8000> DB_CONNECTION DB_HOST DB_PORT DB_DATABASE DB_USERNAME DB_PASSWORD
