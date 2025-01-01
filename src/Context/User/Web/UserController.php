<?php

namespace App\Context\User\Web;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Common\ValueObject\ValueObjectException;
use App\Context\User\Application\UseCase\SaveUser\SaveUser;
use App\Context\User\Application\UseCase\SaveUser\SaveUserCommand;
use App\Context\User\Application\UseCase\UserById\UserById;
use App\Context\User\Application\UseCase\UserList\UserList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/users', name: 'user.')]
final class UserController extends AbstractController
{
    #[Route('/', name: 'findAll', methods: ['GET'])]
    public function list(UserList $userList): Response
    {
        try {
            $users = $userList->execute();
        } catch (RepositoryException $e) {
            return $this->json(['errors repository']);
        } catch (ValueObjectException $e) {
            return $this->json(['errors value object']);
        } catch (MapperException $e) {
            return $this->json(['errors mapper']);
        }

        return $this->render('context/user/users.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/{id}', name: 'findById', methods: ['GET'])]
    public function get(string $id, UserById $userById): Response
    {
        try {
            $user = $userById->execute($id);
        } catch (RepositoryException $e) {
            return $this->json(['errors repository']);
        } catch (ValueObjectException $e) {
            return $this->json(['errors value object']);
        } catch (MapperException $e) {
            return $this->json(['errors mapper']);
        }

        return $this->render('context/user/user.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id?}', name: 'save', methods: ['POST'])]
    public function save(
        ?string                              $id,
        #[MapRequestPayload] SaveUserCommand $saveCommand,
        SaveUser                             $saveUser,
    ): Response
    {
        $saveCommand->id = $id;
        try {
            $saveUser->execute($saveCommand);
        } catch (RepositoryException $e) {
            return $this->json(['errors repository']);
        } catch (ValueObjectException $e) {
            return $this->json(['errors value object']);
        } catch (MapperException $e) {
            return $this->json(['errors mapper']);
        }

        $statusCode = $saveCommand->id ? Response::HTTP_NO_CONTENT : Response::HTTP_CREATED;

        return $this->json(null, $statusCode);
    }

}
