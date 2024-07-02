all:
	@echo "make start - Build repo and start the docker containers"
	@echo "make upb - Build and start the docker containers"
	@echo "make down - Stop and remove the docker containers"
	@echo "make ssh - SSH into the docker container"

start:
	composer install
	yarn install
	docker compose up --build -d

upb:
	docker compose up --build -d

down:
	docker compose down

ssh:
	docker compose exec -it wordpress bash

