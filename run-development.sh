#!/bin/bash
function run_development {
	docker-compose -f docker-compose.yml -f docker-compose.development.yml $@
}

run_development ${@}