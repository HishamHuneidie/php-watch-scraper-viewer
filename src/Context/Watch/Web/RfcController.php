<?php

namespace App\Context\Watch\Web;

use App\Common\Exception\CommonException;
use App\Context\Watch\Application\Dto\EscapedPathnameVoDto;
use App\Context\Watch\Application\UseCase\RfcByPathname\RfcByPathname;
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

        return $this->render('context/watch/rfcs.html.twig', [
            'rfcs' => $rfcs,
        ]);
    }

    #[Route('/{pathname}', name: 'findByPathname', methods: ['GET'])]
    public function get(string $pathname, RfcByPathname $rfcByPathname): Response
    {
        try {
            $pathnameVoDto = EscapedPathnameVoDto::create($pathname);
            $rfc = $rfcByPathname->execute($pathnameVoDto);
        } catch (CommonException $e) {
            return $this->json(['errors']);
        }

        return $this->render('context/watch/rfc.html.twig', [
            'rfc' => $rfc,
        ]);
    }
}
