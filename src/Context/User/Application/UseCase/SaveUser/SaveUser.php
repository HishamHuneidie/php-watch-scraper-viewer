<?php

namespace App\Context\User\Application\UseCase\SaveUser;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Common\ValueObject\IdVo;
use App\Common\ValueObject\ValueObjectException;
use App\Component\Mapper\MapperInterface;
use App\Context\User\Application\Mapper\UserMapper;
use App\Context\User\Domain\Repository\UserRepositoryInterface;
use App\Context\User\Infrastructure\Persistence\Repository\UserRepository;

/**
 * UserCase to create/update user
 */
final readonly class SaveUser
{
    /**
     * @param UserRepository $repository
     * @param UserMapper     $mapper
     */
    public function __construct(
        private UserRepositoryInterface $repository,
        private MapperInterface         $mapper,
    ) {}

    /**
     * @param SaveUserCommand $command
     *
     * @return void
     * @throws MapperException|RepositoryException|ValueObjectException
     */
    public function execute(SaveUserCommand $command): void
    {
        $user = $this->mapper->toEntity($command->user);

        $id = !$command->id ? null : new IdVo($command->id);

        $user->setId($id);

        $this->repository->save($user);
    }
}