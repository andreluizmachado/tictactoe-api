#!/bin/bash

. ./run-install.sh

function run_testing {
	docker-compose -f docker-compose.yml -f docker-compose.testing.yml $@
}

run_testing up -d

docker logs tictactoeapi_tictactoe-tests_1

run_testing down --remove-orphans
