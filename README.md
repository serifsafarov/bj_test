## Docker

- docker-compose build
- docker-compose up -d
- docker exec -it bj_php bash (enter the main container)

## App (run commands in bj_php container)
- composer install
- ./vendor/bin/phinx migrate

## DONE
Now you can access app on http://localhost:4000
