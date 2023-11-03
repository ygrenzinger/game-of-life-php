WORKING_DIR := $(shell pwd)
UID := $(shell id -u)
GID := $(shell id -g)

.PHONY: test
test: vendor
	docker run --rm -it -v ${WORKING_DIR}:/app -w /app --user ${UID}:${GID} php:8.2-cli-alpine bin/phpunit

vendor:
	docker run --rm -it -v ${WORKING_DIR}:/app -w /app --user ${UID}:${GID} composer install
