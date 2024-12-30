#!/usr/bin/env php
<?php

require_once 'color-script.php';

$command = $argv[1] ?? '';

$errorMessage = "Error: The command '{$command}' does not exist";

StringUtils::print(
    Background::color(Background::RED, $errorMessage),
);