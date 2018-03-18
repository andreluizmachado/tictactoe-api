#!/bin/bash

. ./bin/run-install.sh

function run_testing {
	docker-compose -f docker-compose.yml -f docker-compose.testing.yml $@
}

cd docker-compose-files

run_testing up --build -d

docker logs -f dockercomposefiles_tictactoe-tests_1

run_testing down --remove-orphans
