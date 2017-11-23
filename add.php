#!/usr/bin/env php
<?php
date_default_timezone_set("Europe/Warsaw");
include('vendor/autoload.php');
include('secret.php');

$endomondo = new \Fabulator\Endomondo\Endomondo();
$endomondo->login(ENDOMONDO_USERNAME, ENDOMONDO_PASSWORD);
if ($argc == 5) {
    $date = new \DateTime($argv[1] . ' ' . $argv[2]);
    $time = intval($argv[3]);
    $endDate = clone $date;
    $endDate->modify("+{$time} minutes");
    $length = floatval($argv[4]);
} elseif ($argc == 4) {
    $date = new \DateTime($argv[1]);
    $time = intval($argv[2]);
    $endDate = clone $date;
    $endDate->modify("+{$time} minutes");
    $length = floatval($argv[3]);
} else {
    die("Usage: php {$argv[0]} DATE DURATION_MINUTES DISTANCE_KM\n");
}
$id = $endomondo->workouts->create(\Fabulator\Endomondo\Endomondo::SPORT_CYCLING_TRANSPORT, $date, $time * 60, $length);
$endomondo->getOldAPI()->editWorkout($id, ['end_time' => gmdate("Y-m-d H:i:s \U\T\C", $endDate->format("U"))]);
echo "Added workout ID $id\n";
