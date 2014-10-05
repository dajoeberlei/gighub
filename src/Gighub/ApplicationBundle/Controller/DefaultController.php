<?php

namespace Gighub\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $session->set("name", $request->attributes->get("firstName"));
        $this->get('session')->getFlashBag()->add(
            'notice',
            'Your changes were saved!'
        );
        return $this->render('GighubApplicationBundle:Default:index.html.twig', array('firstName' => $request->attributes->get("firstName")));
    }

}
