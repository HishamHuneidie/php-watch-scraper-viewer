<?php

namespace App\Context\Watch\Application\UseCase\RfcList;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\RfcDto;
use App\Context\Watch\Application\Mapper\RfcMapper;
use App\Context\Watch\Domain\Repository\RfcRepositoryInterface;
use App\Context\Watch\Infrastructure\Persistence\Repository\RfcRepository;

final readonly class GetRfcList
{
    /**
     * @param RfcRepository $repository
     * @param RfcMapper     $mapper
     */
    public function __construct(
        private RfcRepositoryInterface $repository,
        private MapperInterface        $mapper,
    ) {}

    /**
     * @return RfcDto[]
     * @throws RepositoryException|MapperException
     */
    public function execute(): array
    {
        $rfcList = $this->repository->find();

        return $this->mapper->fromEntityList($rfcList);
    }

}
