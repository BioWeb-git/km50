# Executables
DOCKER_COMPOSE = docker compose
START_LOCAL_WEB_SERVER = sudo symfony server:start
STOP_LOCAL_WEB_SERVER = sudo symfony server:stop
RESTART_LOCAL_WEB_SERVER = sudo symfony server:stop && sudo symfony server:start

# Misc
.DEFAULT_GOAL = help
.PHONY        : # Not needed here, but you can put your all your targets to be sure
                # there is no name conflict between your files and your targets.

CONTAINERS = mysql

## —— Makefile
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

## —— Docker
start: ## Start environment
	@$(DOCKER_COMPOSE) start $(CONTAINERS)
	@$(START_LOCAL_WEB_SERVER)

stop: ## Stop environment
	@$(DOCKER_COMPOSE) stop
	@$(STOP_LOCAL_WEB_SERVER)

## —— Project
install: ## Install and configure project
	@$(DOCKER_COMPOSE) up -d $(CONTAINERS)
	@$(RESTART_LOCAL_WEB_SERVER)

update: ## Update project
	@$(DOCKER_COMPOSE) up -d $(CONTAINERS)
	@$(RESTART_LOCAL_WEB_SERVER)
