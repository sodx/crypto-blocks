all:
	@echo "make upb - Build and start the docker containers"
	@echo "make down - Stop and remove the docker containers"
	@echo "make ssh - SSH into the docker container"

upb:
	docker compose up --build -d

down:
	docker compose down

ssh:
	docker compose exec -it wordpress bash

