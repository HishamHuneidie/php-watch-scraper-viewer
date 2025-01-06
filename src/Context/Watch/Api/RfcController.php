<?php

namespace App\Context\Watch\Api;

use App\Common\Exception\CommonException;
use App\Context\Watch\Application\Dto\EscapedPathnameVoDto;
use App\Context\Watch\Application\UseCase\GetRfcByPathname\GetRfcByPathname;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/watch', name: 'api.watch.rfcs')]
class RfcController extends AbstractController
{
    #[Route('/{pathname}')]
    public function get(string $pathname, GetRfcByPathname $getRfcByPathname): JsonResponse
    {
        try {
            $rfc = $getRfcByPathname->execute(new EscapedPathnameVoDto($pathname));
        } catch (CommonException $e) {
            return $this->json(['errors' => 'Error getting RFC']);
        }

        return $this->json($rfc);
    }

}
