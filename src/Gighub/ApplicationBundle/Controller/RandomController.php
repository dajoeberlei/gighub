<?php
namespace Gighub\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RandomController extends Controller
{
    public function indexAction($limit)
    {
        $number = rand(1, $limit);

        return $this->render(
            'GighubApplicationBundle:Random:index.html.twig',
            array('number' => $number)
        );
    }
}