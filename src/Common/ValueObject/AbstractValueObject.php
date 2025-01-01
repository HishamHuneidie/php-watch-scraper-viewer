<?php

namespace App\Common\ValueObject;

use App\Common\Util\GetterSetterTrait;

abstract class AbstractValueObject implements ValueObjectInterface
{
    use GetterSetterTrait;
}
