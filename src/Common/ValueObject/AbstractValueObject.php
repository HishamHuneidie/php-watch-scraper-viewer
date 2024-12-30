<?php

namespace CodeAnalyzer\Common\ValueObject;

/**
 * @psalm-template TValueObject
 */
abstract class AbstractValueObject implements ValueObjectInterface
{
    /**
     * Create a new instance of a value object
     *
     * @param mixed $value
     * @psalm-return TValueObject
     * @throws ValueObjectException
     */
    public static function new(mixed $value): object
    {
        $className = get_called_class();
        return new $className($value);
    }

}
