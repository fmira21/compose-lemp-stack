# Basic rule: build or rebuild the composed containers
all:
	docker-compose -f srcs/docker-compose.yml --env-file ./srcs/.env up --build
# Assign domain name to the localhost
hosts:
	echo "127.0.0.1 lemp-stack.com" | tee -a /etc/hosts
# Stop the containers
clean:
	docker-compose -f srcs/docker-compose.yml down
# Remove the volumes. To remove the images, use the RELOAD rule
fclean: clean
	docker system prune -a --volumes
# Remove all volumes and images. In order to stop all containers, remove them and clear volume directories, launch the separate reload.sh script.
reload: clean
	docker stop $(docker ps -qa)
	docker rm $(docker ps -qa)
	docker rmi -f $(docker images -qa)
	docker volume rm $(docker volume ls -q)
	docker network rm $(docker network ls -q) 2>/dev/null
# Remove all volumes and rebuild
re: fclean all
# Backup data directory with all volumes
backup:
	rm -rf backup
	mkdir backup
	cp -r $HOME/data/* ./backup/
# Restore the backup
restore:
	rm -rf $HOME/data
	cp -r ./backup/* $HOME/data/
# Connect containers
connect:
	docker-compose -f srcs/docker-compose.yml exec $(service) bash
# Force-stop the setup
force-stop:
	killall containerd-shim
	docker-compose -f srcs/docker-compose.yml down
# Reload the setup
reload:
	docker stop $(docker ps -qa)
	docker rm $(docker ps -qa)
	docker rmi -f $(docker images -qa)
	docker volume rm $(docker volume ls -q)
	docker network rm $(docker network ls -q) 2>/dev/null

