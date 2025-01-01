<?php

namespace App\Context\Watch\Web;

use App\Common\Exception\CommonException;
use App\Context\Watch\Application\Dto\LinkVoDto;
use App\Context\Watch\Application\UseCase\RfcByLink\RfcByLink;
use App\Context\Watch\Application\UseCase\RfcList\RfcList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/watch/rfcs', name: 'watch.rfcs')]
final class RfcController extends AbstractController
{
    #[Route('/', name: 'findAll', methods: ['GET'])]
    public function list(RfcList $rfcList): Response
    {
        try {
            $rfcs = $rfcList->execute();
        } catch (CommonException $e) {
            return $this->json(['errors']);
        }

        return $this->json(
            [
                'rfcs' => $rfcs,
            ]);
    }

    #[Route('/{link}', name: 'findByLink', methods: ['GET'])]
    public function get(string $link, RfcByLink $rfcByLink): Response
    {
        try {
            $linkVoDto = LinkVoDto::create($link);
            $rfc = $rfcByLink->execute($linkVoDto);
        } catch (CommonException $e) {
            return $this->json(['errors']);
        }

        return $this->json([
            'rfc' => $rfc,
        ]);
    }
}
