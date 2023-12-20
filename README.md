Pre-requisites
-------
- Docker desktop

Installation
-------
For project installation, please follow next steps:
- Clone the repo
- Open terminal and go to the project directory
- Execute `cp .env.example .env`
- Execute `docker compose build` to build the images
- Execute `docker run -it --rm -v $(pwd):/app test-task/app composer install -o` to install composer dependencies
- Execute `docker compose up -d` to start the containers
- Execute `docker exec -it test-task-app-1 bash` to run access container terminal
- Execute `./.bin/setup-app.sh`

Run vite dev mode
-------
Inside application container run `npm run dev`

Generate Laravel IDE helper files
-------
- Execute `php artisan ide-helper:generate`
- Execute `php artisan ide-helper:meta`
- Execute `php artisan ide-helper:models --write-mixin`

Run migrations
-------
- Execute `./vendor/bin/sail artisan migrate --force`

Recreate DB
-------
- Execute `./vendor/bin/sail artisan migrate:refresh --seed`

Run test
-------
- Execute `./vendor/bin/sail composer test`
