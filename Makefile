SHELL=/bin/bash

build:
	docker-compose build

up:
	USER_NAME=$(shell id -nu) USER_ID=$(shell id -u) GROUP_NAME=$(shell id -ng) GROUP_ID=$(shell id -g) docker-compose up -d

stop:
	docker-compose stop

down:
	docker-compose down

docker-build:
	docker-compose build

ps:
	docker ps

shell:
	docker exec -it my-reward-app /bin/bash

models:
	php artisan -N ide-helper:models
