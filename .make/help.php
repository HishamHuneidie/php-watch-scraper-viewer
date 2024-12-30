#!/usr/bin/env php
<?php

require_once 'color-script.php';

$allowedCommands = [
    "build            " => "Build containers and install composer dependencies",
    "start            " => "Start containers",
    "restart          " => "Restart containers",
    "remove           " => "Remove containers",
    "logs             " => "Show logs",
    "bash             " => "Access to the main container terminal",
    "db-bash          " => "Access to the database container terminal",
    "composer-clean   " => "Clean cache",
    "composer-add     " => "Install a vendor package (eg: %purple%make composer-add vendor=my-package%fin%)",
    "tree             " => "Update/Generate directory tree",
];

StringUtils::print(Color::color(Color::GREEN, "\nAllowed commands:"));

foreach ($allowedCommands as $command => $description) {
    $description = str_replace(
        ['%purple%', '%fin%'],
        [Color::PURPLE->value, Color::CLOSE->value],
        $description,
    );

    $coloredCommand = Color::color(Color::PURPLE, $command);
    $printedLine = " {$coloredCommand}: {$description}";

    StringUtils::print($printedLine);
}