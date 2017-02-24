#Endomondo cycling workout creator

##Install
- Run composer
```
composer install -n
```
- Edit your credentials in `secret.php` (template in `secret.php.dist`)

##Usage
```
./add.php DATE_TIME DURATION_MINUTES DISTANCE_KILOMETERS
```
Example (creates an 18 minutes workout with distance 4.3 kilometers, today at 15:20):
```
./add.php 'today 15:20' 18 4.3
```

If you want to delete a workout:
```
./delete.php WORKOUT_ID
```
##Running with docker
###Run composer
```
docker run --rm -v "$PWD":/app composer/composer install -n
```
###Run commands
```bash
docker run --rm -v "$PWD":/endomondo -w /endomondo php:cli php add.php 15:25 16 4.3
```
```bash
docker run --rm -v "$PWD":/endomondo -w /endomondo php:cli php delete.php WORKOUT_ID
```
