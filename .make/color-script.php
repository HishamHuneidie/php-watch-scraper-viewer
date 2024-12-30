#!/usr/bin/env php
<?php

# Class to print strings
class StringUtils
{
    public static function print(string $text): void
    {
        echo "{$text}\n";
    }
}

# Define colors
enum Color: string
{
    case RED    = "\e[0;31m";
    case GREEN  = "\e[0;32m";
    case BLUE   = "\e[0;34m";
    case YELLOW = "\e[0;33m";
    case BLACK  = "\e[0;30m";
    case PURPLE = "\e[0;35m";
    case CYAN   = "\e[0;36m";
    case WHITE  = "\e[0;37m";
    case CLOSE  = "\e[0m";

    # Methods to put color in texts
    public static function color(self $textColor, string $text): string
    {
        $colorStr = $textColor->value;
        $colorEnd = self::CLOSE->value;

        return "{$colorStr}{$text}{$colorEnd}";
    }
}

enum Background: string
{
    case RED    = "\e[1;41m";
    case GREEN  = "\e[1;42m";
    case BLUE   = "\e[1;44m";
    case YELLOW = "\e[1;43m";
    case BLACK  = "\e[1;40m";
    case PURPLE = "\e[1;45m";
    case CYAN   = "\e[1;46m";
    case WHITE  = "\e[1;47m";
    case CLOSE  = "\e[0m";

    # Methods to put color in texts
    public static function color(self $textColor, string $text): string
    {
        $tab = "  ";
        $colorStr = $textColor->value;
        $colorEnd = self::CLOSE->value;

        $printedText = "{$tab}{$text}{$tab}";

        $line = "";
        for ($i = 0; $i < strlen($printedText); $i++) {
            $line .= " ";
        }

        return implode( "\n", [
            "",
            "{$colorStr}{$line}{$colorEnd}",
            "{$colorStr}{$printedText}{$colorEnd}",
            "{$colorStr}{$line}{$colorEnd}",
            "",
        ]);
    }
}