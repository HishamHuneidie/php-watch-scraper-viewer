<?php

namespace App\Context\User\Domain\Entity;

use App\Common\Util\EnumTrait;

enum UserStatus: string
{
    use EnumTrait;

    case ACTIVE  = 'ACTIVE';
    case BLOCKED = 'BLOCKED';
    case DELETED = 'DELETED';
}
