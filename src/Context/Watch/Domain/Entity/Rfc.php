<?php

namespace App\Context\Watch\Domain\Entity;

use App\Common\Util\GetterSetterTrait;

/**
 * An RFC is a Request for comments
 *
 * Getters:
 * @method LinkVo getLink()
 * @method string getTitle()
 * @method string getType()
 * @method string getVersion()
 * @method string getStatus()
 * @method string getContent()
 * @method LinkVo getPhpLink()
 */
final readonly class Rfc
{
    use GetterSetterTrait;

    public function __construct(
        private LinkVo $link,
        private string $title,
        private string $type,
        private string $version,
        private string $status,
        private string $content = '',
        private LinkVo $phpLink = new LinkVo(''),
    ) {}
}
