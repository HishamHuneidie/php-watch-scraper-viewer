<?php

namespace CodeAnalyzer\Common\Util;

use CodeAnalyzer\Common\Exception\CommonException;

trait EnumTrait
{

    public static function fromName(string $name): self
    {
        foreach (self::cases() as $enum) {
            if ($enum->name === $name) {
                return $enum;
            }
        }

        throw new CommonException('Error searching enum');
    }

    public static function toString(): string
    {
        $validOptions = array_map(fn(self $status) => $status->value, self::cases());
        return implode(', ', $validOptions);
    }
}