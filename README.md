Installation
-------
For installation project, please follow next instruction:
- Clone the repo
- Open terminal and enter to project directory
- Execute `./vendor/bin/sail up -d` to start the containers
- Execute `./vendor/bin/sail artisan migrate --refresh --seed` to create DB and seed it

Run vite dev mode
-------
Inside application container run `npm run dev`

Generate Laravel IDE helper files
-------
- Execute `./vendor/bin/sail artisan ide-helper:generate`
- Execute `./vendor/bin/sail artisan ide-helper:meta`
- Execute `./vendor/bin/sail artisan ide-helper:models --write-mixin`

Run migrations
-------
- Execute `./vendor/bin/sail artisan migrate --force`

Recreate DB
-------
- Execute `./vendor/bin/sail artisan migrate:refresh --seed`

Run test
-------
- Execute `./vendor/bin/sail composer test`
