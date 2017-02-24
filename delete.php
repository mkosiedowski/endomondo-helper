#!/usr/bin/env php
<?php
include('vendor/autoload.php');
include('secret.php');
$endomondo = new \Fabulator\Endomondo\Endomondo();
$endomondo->login(ENDOMONDO_USERNAME, ENDOMONDO_PASSWORD);
if ($argc == 2) {
    $endomondo->workouts->delete($argv[1]);
} else {
    die("Usage: php {$argv[0]} WORKOUT_ID\n");
}
