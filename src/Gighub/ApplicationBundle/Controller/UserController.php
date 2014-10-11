<?php

namespace Gighub\ApplicationBundle\Controller;

use Gighub\ApplicationBundle\Entity\ShowDate;
use Gighub\ApplicationBundle\Entity\User;
use Gighub\ApplicationBundle\Form\CreateShowDateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

class UserController extends Controller
{


    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new CreateUserType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $entityManager = $this->get("doctrine.orm.entity_manager");
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('showUser', array("id" => $user->getId())));
        }

        return $this->render("GighubApplicationBundle:User:create.html.twig", array("form" => $form->createView()));
    }

    public function showAction($id)
    {


        $currentUser = $this->getUser();
        $entityManager = $this->get("doctrine.orm.entity_manager");
        $repository = $entityManager->getRepository(User::class);
        $user = $repository->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No User found for id '.$id
            );
        }



        return $this->render('GighubApplicationBundle:User:show.html.twig', array('user' => $user, 'currentUser' => $currentUser));

    }

    public function listAction()
    {


        $currentUser = $this->getUser();
        $entityManager = $this->get("doctrine.orm.entity_manager");
        $repository = $entityManager->getRepository(User::class);
        $allUsers = $repository->findAll();


        return $this->render('GighubApplicationBundle:User:list.html.twig', array('allUsers' => $allUsers,'currentUser' => $currentUser));

    }

    public function homeAction()
    {
        $user = $this->getUser();

    }

}
