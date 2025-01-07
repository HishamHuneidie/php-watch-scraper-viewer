<?php

namespace App\Context\Watch\Application\UseCase\GetVersionList;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\VersionDto;
use App\Context\Watch\Application\Mapper\VersionMapper;
use App\Context\Watch\Domain\Repository\VersionRepositoryInterface;
use App\Context\Watch\Infrastructure\Persistence\Repository\VersionRepository;

final readonly class GetVersionList
{
    /**
     * @param VersionRepository $repository
     * @param VersionMapper     $mapper
     */
    public function __construct(
        private VersionRepositoryInterface $repository,
        private MapperInterface            $mapper,
    ) {}

    /**
     * Searches Versions
     *
     * @return VersionDto[]
     * @throws RepositoryException|MapperException
     */
    public function execute(): array
    {
        $versions = $this->repository->find();

        return $this->mapper->fromEntityList($versions);
    }

}
