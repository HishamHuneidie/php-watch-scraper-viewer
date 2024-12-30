<?php

namespace CodeAnalyzer\Context\User\Application\UseCase\SaveUser;

use CodeAnalyzer\Context\User\Application\Dto\UserDto;

/**
 * RequestCommand used to save a user
 */
final class SaveUserCommand
{
    public function __construct(
        public ?string $id,
        public UserDto $user,
    ) {}
}