<?php

namespace Gighub\ApplicationBundle\Controller;

use Gighub\ApplicationBundle\Entity\Artist;
use Gighub\ApplicationBundle\Entity\User;
use Gighub\ApplicationBundle\Form\CreateArtistType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

class ArtistController extends Controller
{


    public function createAction(Request $request)
    {
        $currentUser = $this->getUser();
        $artist = new Artist();
        $form = $this->createForm(new CreateArtistType(), $artist);

        $form->handleRequest($request);

        if ($form->isValid()) {
            echo count($artist->getMembers()->get(0)->getArtists());
            die();
            $entityManager = $this->get("doctrine.orm.entity_manager");
            $entityManager->persist($artist);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('showArtist', array("id" => $artist->getId())));
        }

        return $this->render("GighubApplicationBundle:Artist:create.html.twig", array("form" => $form->createView(), "currentUser" => $currentUser));
    }

    public function showAction($id)
    {


        $currentUser = $this->getUser();
        $entityManager = $this->get("doctrine.orm.entity_manager");
        $repository = $entityManager->getRepository(Artist::class);
        $artist = $repository->find($id);

        if (!$artist) {
            throw $this->createNotFoundException(
                'No Artist found for id '.$id
            );
        }



        return $this->render('GighubApplicationBundle:Artist:show.html.twig', array('artist' => $artist, 'currentUser' => $currentUser));

    }

}
