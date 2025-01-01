<?php

namespace App\Context\User\Domain\Repository;

use App\Common\Repository\RepositoryException;
use App\Common\ValueObject\IdVo;
use App\Context\User\Domain\Entity\User;

/**
 * Manage user
 */
interface UserRepositoryInterface
{

    /**
     * Search all users with no filters
     *
     * @return User[]
     * @throws RepositoryException
     */
    public function find(): array;

    /**
     * Search a user by ID
     *
     * @param IdVo $id
     *
     * @return User
     * @throws RepositoryException
     */
    public function findById(IdVo $id): User;

    /**
     * Save or update user
     *
     * @param User $user
     *
     * @return void
     * @throws RepositoryException
     */
    public function save(User $user): void;
}