# CleanCode

Cours sur la qualité du code.

## Image Docker

```sh
docker pull selenium/standalone-chrome-debug
```

## Lancer les tests avec PHPUnit

```sh
vendor/bin/phpunit --colors=always --bootstrap="vendor/autoload.php"
```

```sh
vendor/bin/phpunit --colors=always --configuration phpunit.xml
```

### Lancer l'application avec Docker Compose

```sh
docker-compose up -d
```

### Stopper l'application avec Docker Compose

```sh
docker-compose down -v
```

### Lancer un container avec Selenium
```sh
docker run -d -P -p 4444:4444 -p 37810:5900 -v /dev/shm:/dev/shm selenium/standalone-chrome-debug
```