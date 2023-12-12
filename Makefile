up:
	docker compose up -d
	@make npm-dev
build:
	docker compose build --no-cache --force-rm
laravel-install:
	docker compose exec laravel.test composer create-project --prefer-dist laravel/laravel .
create-project:
	mkdir -p backend
	@make build
	@make up
	@make laravel-install
	docker compose exec laravel.test php artisan key:generate
	docker compose exec laravel.test php artisan storage:link
	docker compose exec laravel.test chmod -R 777 storage bootstrap/cache
	@make fresh
install-recommend-packages:
	docker compose exec laravel.test composer require doctrine/dbal
	docker compose exec laravel.test composer require --dev ucan-lab/laravel-dacapo
	docker compose exec laravel.test composer require --dev barryvdh/laravel-ide-helper
	docker compose exec laravel.test composer require --dev beyondcode/laravel-dump-server
	docker compose exec laravel.test composer require --dev barryvdh/laravel-debugbar
	docker compose exec laravel.test composer require --dev roave/security-advisories:dev-master
	docker compose exec laravel.test php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	docker compose exec laravel.test php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
init:
	docker compose up -d
	docker compose exec laravel.test composer install
	docker compose exec laravel.test cp .env.example .env
	docker compose exec laravel.test php artisan key:generate
	docker compose exec laravel.test php artisan storage:link
	docker compose exec laravel.test chmod -R 777 storage bootstrap/cache
	docker compose exec laravel.test php artisan migrate
	docker compose exec laravel.test php artisan db:seed
	docker compose exec laravel.test npm install
	docker compose exec laravel.test npm run dev
	@make fresh
remake:
	@make destroy
	@make init
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
restart:
	@make down
	@make up
destroy:
	docker compose down --rmi all --volumes --remove-orphans
destroy-volumes:
	docker compose down --volumes --remove-orphans
ps:
	docker compose ps
logs:
	docker compose logs
logs-watch:
	docker compose logs --follow
log-web:
	docker compose logs web
log-web-watch:
	docker compose logs --follow web
log-app:
	docker compose logs app
log-app-watch:
	docker compose logs --follow app
log-db:
	docker compose logs db
log-db-watch:
	docker compose logs --follow db
php:
	docker compose exec -it laravel.test bash
migrate:
	docker compose exec laravel.test php artisan migrate
fresh:
	docker compose exec laravel.test php artisan migrate:fresh --seed
seed:
	docker compose exec laravel.test php artisan db:seed
dacapo:
	docker compose exec laravel.test php artisan dacapo
rollback-test:
	docker compose exec laravel.test php artisan migrate:fresh
	docker compose exec laravel.test php artisan migrate:refresh
tinker:
	docker compose exec laravel.test php artisan tinker
test:
	docker compose exec laravel.test php artisan test
optimize:
	docker compose exec laravel.test php artisan optimize
optimize-clear:
	docker compose exec laravel.test php artisan optimize:clear
cache:
	docker compose exec laravel.test composer dump-autoload -o
	docker compose exec laravel.test php artisan clear-compiled
	docker compose exec laravel.test php artisan config:cache
	@make optimize
	docker compose exec laravel.test php artisan event:cache
	docker compose exec laravel.test php artisan view:cache
cache-clear:
	docker compose exec laravel.test composer clear-cache
	@make optimize-clear
	docker compose exec laravel.test php artisan event:clear
npm:
	@make npm-install
npm-install:
	docker compose exec laravel.test npm install
npm-dev:
	docker compose exec laravel.test npm run dev
db:
	docker compose exec mysql bash
sql:
	docker compose exec mysql bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	docker compose exec redis redis-cli
ide-helper:
	docker compose exec laravel.test php artisan clear-compiled
	docker compose exec laravel.test php artisan ide-helper:generate
	docker compose exec laravel.test php artisan ide-helper:meta
	docker compose exec laravel.test php artisan ide-helper:models --nowrite
