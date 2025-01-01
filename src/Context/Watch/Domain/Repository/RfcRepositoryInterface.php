<?php

namespace App\Context\Watch\Domain\Repository;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Context\Watch\Domain\Entity\PathnameVo;
use App\Context\Watch\Domain\Entity\Rfc;

interface RfcRepositoryInterface
{
    /**
     * Searches a list of RFCs
     *
     * @return Rfc[]
     * @throws RepositoryException|MapperException
     */
    public function find(): array;

    /**
     * Searches the content of a RFCs
     *
     * @param PathnameVo $pathnameVo
     *
     * @return Rfc
     * @throws RepositoryException
     * @throws MapperException
     */
    public function findByPathname(PathnameVo $pathnameVo): Rfc;

}
