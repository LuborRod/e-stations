init: docker-down-clear docker-pull docker-build docker-up api-init
up: docker-up
down: docker-down
restart: down up

migrations: api-init-migrations

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

api-init: api-composer-install api-change-mode-to-assets

api-composer-install:
	docker-compose run --rm php-cli composer install

api-change-mode-to-assets:
	docker-compose run --rm php-cli chmod -R 777 web/assets/

api-init-migrations:
	docker-compose run --rm  php-cli php yii migrate --interactive=0