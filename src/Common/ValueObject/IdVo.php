<?php

namespace CodeAnalyzer\Common\ValueObject;

use CodeAnalyzer\Common\Util\GetterSetterTrait;
use CodeAnalyzer\Common\Util\UuidService;

/**
 * ID with a UUID format. This has 32 characters separated in 5 groups (8–4–4–4–12)
 *
 * @method string getValue()
 * @extends AbstractValueObject<IdVo>
 */
class IdVo extends AbstractValueObject
{
    use GetterSetterTrait;

    /**
     * @param string $value
     * @throws ValueObjectException
     */
    public function __construct(
        private readonly string $value,
    )
    {
        $this->validations();
    }

    /**
     * @inheritDoc
     */
    public function equals(ValueObjectInterface $object): bool
    {
        return $object instanceof IdVo
            && $this->value === $object->getValue();
    }

    /**
     * @return void
     * @throws ValueObjectException
     */
    private function validations(): void
    {
        if (!UuidService::isValid($this)) {
            throw new ValueObjectException('ID is a non-valid ID');
        }

    }
}