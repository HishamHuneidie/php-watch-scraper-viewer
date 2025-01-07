<?php

namespace App\Context\Watch\Domain\Repository;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Context\Watch\Domain\Entity\Version;

interface VersionRepositoryInterface
{
    /**
     * Searches all PHP versions with no filters
     *
     * @return Version[]
     * @throws RepositoryException|MapperException
     */
    public function find(): array;

    /**
     * Searches one version by number
     *
     * @param string $versionNumber
     *
     * @return Version
     * @throws RepositoryException|MapperException
     */
    public function findByVersionNumber(string $versionNumber): Version;

}
