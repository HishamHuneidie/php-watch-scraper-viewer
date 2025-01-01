<?php

namespace App\Context\Watch\Application\UseCase\RfcByLink;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\LinkVoDto;
use App\Context\Watch\Application\Dto\RfcDto;
use App\Context\Watch\Application\Mapper\LinkVoMapper;
use App\Context\Watch\Application\Mapper\RfcMapper;
use App\Context\Watch\Domain\Repository\RfcRepositoryInterface;
use App\Context\Watch\Infrastructure\Persistence\Repository\RfcRepository;

final readonly class RfcByLink
{
    /**
     * @param RfcRepository          $repository
     * @param RfcMapper|LinkVoMapper $mapper
     */
    public function __construct(
        private RfcRepositoryInterface $repository,
        private MapperInterface        $mapper,
    ) {}

    /**
     * @param LinkVoDto $linkVoDto
     *
     * @return RfcDto
     * @throws MapperException
     * @throws RepositoryException
     */
    public function execute(LinkVoDto $linkVoDto): RfcDto
    {
        $linkVo = $this->mapper->toEntity($linkVoDto);

        $rfc = $this->repository->findByLink($linkVo);

        return $this->mapper->fromEntity($rfc);
    }

}
