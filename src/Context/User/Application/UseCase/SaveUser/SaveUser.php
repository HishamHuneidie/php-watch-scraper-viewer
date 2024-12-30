<?php

namespace CodeAnalyzer\Context\User\Application\UseCase\SaveUser;

use CodeAnalyzer\Common\Mapper\MapperException;
use CodeAnalyzer\Common\Repository\RepositoryException;
use CodeAnalyzer\Common\ValueObject\IdVo;
use CodeAnalyzer\Common\ValueObject\ValueObjectException;
use CodeAnalyzer\Component\Mapper\MapperInterface;
use CodeAnalyzer\Context\User\Application\Mapper\UserMapper;
use CodeAnalyzer\Context\User\Domain\Repository\UserRepositoryInterface;
use CodeAnalyzer\Context\User\Infrastructure\Persistence\Repository\UserRepository;

/**
 * UserCase to create/update user
 */
final readonly class SaveUser
{
    /**
     * @param UserRepository $repository
     * @param UserMapper $mapper
     */
    public function __construct(
        private UserRepositoryInterface $repository,
        private MapperInterface         $mapper,
    ) {}

    /**
     * @param SaveUserCommand $command
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