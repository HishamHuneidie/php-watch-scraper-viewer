<?php

namespace App\Context\Watch\Application\Dto;

use App\Common\ValueObject\AbstractValueObject;
use App\Common\ValueObject\ValueObjectException;
use App\Common\ValueObject\ValueObjectInterface;

/**
 * LinkId that escapes the slashes
 *
 * @method string getValue()
 * @extends AbstractValueObject<string, LinkVoDto>
 */
final class LinkVoDto extends AbstractValueObject
{
    /**
     * @param string $value
     *
     * @throws ValueObjectException
     */
    public function __construct(
        public readonly string $value,
    )
    {
        $this->validations();
    }

    public function equals(ValueObjectInterface $object): bool
    {
        return $object instanceof LinkVoDto
            && $this->value === $object->getValue();
    }

    /**
     * Add validations on creation
     *
     * @return void
     * @throws ValueObjectException
     */
    private function validations(): void
    {
        if (str_contains($this->value, "/")) {
            throw new ValueObjectException('This link cannot have slashes (/)');
        }
    }

    /**
     * Create a new instance of a value object
     *
     * @param string $value
     *
     * @return ValueObjectInterface
     * @throws ValueObjectException
     */
    public static function create(string $value): object
    {
        return new self($value);
    }

}
