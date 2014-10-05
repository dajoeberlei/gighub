<?php

namespace Gighub\ApplicationBundle\Controller;

use Gighub\ApplicationBundle\Entity\ShowDate;
use Gighub\ApplicationBundle\Form\CreateShowDateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class ShowDateController extends Controller
{


    public function createAction(Request $request)
    {
        $showDate = new ShowDate();
        $form = $this->createForm(new CreateShowDateType(), $showDate);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $entityManager = $this->get("doctrine.orm.entity_manager");
            $entityManager->persist($showDate);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('showShowDate', array("id" => $showDate->getId())));
        }

        return $this->render("GighubApplicationBundle:ShowDate:create.html.twig", array("form" => $form->createView()));
    }

    public function showAction($id)
    {
        $entityManager = $this->get("doctrine.orm.entity_manager");
        $repository = $entityManager->getRepository(ShowDate::class);
        $showDate = $repository->find($id);

        if (!$showDate) {
            throw $this->createNotFoundException(
                'No Show Date found for id '.$id
            );
        }

        return $this->render('GighubApplicationBundle:ShowDate:show.html.twig', array('showDate' => $showDate));

    }

    public function updateAction($id, $updatedStatus)
    {
        $entityManager = $this->get("doctrine.orm.entity_manager");
        $repository = $entityManager->getRepository(ShowDate::class);
        $showDate = $repository->find($id);

        if (!$showDate) {
            throw $this->createNotFoundException(
                'No ShowDate found for id '.$id
            );
        }

        $showDate->setStatus($updatedStatus);
        $entityManager->flush();

        return $this->redirect($this->generateUrl('showShowDate', array( "id" => $id) ));
    }
}
