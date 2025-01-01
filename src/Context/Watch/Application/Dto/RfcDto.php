<?php

namespace App\Context\Watch\Application\Dto;

/**
 * An RFC is a Request for comments
 */
final class RfcDto
{
    public function __construct(
        public LinkVoDto $link,
        public string    $title,
        public string    $type,
        public string    $version,
        public string    $status,
        public string    $content = '',
        public LinkVoDto $phpLink = new LinkVoDto(''),
    ) {}
}
