<?php

namespace CodeAnalyzer\Context\User\Application\Dto;

/**
 * Dto User. Used in presentation and application layers
 */
final readonly class UserDto
{
    public function __construct(
        public string $id,
        public string $username,
        public string $email,
        public string $password,
        public string $status,
        public string $createdAt,
    ) {}
}