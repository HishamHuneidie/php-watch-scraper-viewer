<?php

namespace App\Context\Watch\Application\UseCase\RfcByPathname;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\EscapedPathnameVoDto;
use App\Context\Watch\Application\Dto\RfcDto;
use App\Context\Watch\Application\Mapper\PathnameVoMapper;
use App\Context\Watch\Application\Mapper\RfcMapper;
use App\Context\Watch\Domain\Repository\RfcRepositoryInterface;
use App\Context\Watch\Infrastructure\Persistence\Repository\RfcRepository;

final readonly class RfcByPathname
{
    /**
     * @param RfcRepository              $repository
     * @param RfcMapper|PathnameVoMapper $mapper
     */
    public function __construct(
        private RfcRepositoryInterface $repository,
        private MapperInterface        $mapper,
    ) {}

    /**
     * @param EscapedPathnameVoDto $pathnameVoDto
     *
     * @return RfcDto
     * @throws MapperException
     * @throws RepositoryException
     */
    public function execute(EscapedPathnameVoDto $pathnameVoDto): RfcDto
    {
        $pathnameVo = $this->mapper->toEntity($pathnameVoDto);

        $rfc = $this->repository->findByPathname($pathnameVo);

        return $this->mapper->fromEntity($rfc);
    }

}
