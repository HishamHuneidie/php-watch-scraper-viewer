<?php

namespace CodeAnalyzer\Context\User\Domain\Entity;

use CodeAnalyzer\Common\Util\EnumTrait;

enum UserStatus: string
{
    use EnumTrait;

    case ACTIVE  = 'ACTIVE';
    case BLOCKED = 'BLOCKED';
    case DELETED = 'DELETED';
}
