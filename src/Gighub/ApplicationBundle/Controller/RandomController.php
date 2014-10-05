<?php
namespace Gighub\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RandomController extends Controller
{
    public function indexAction($limit, Request $request)
    {
        $number = rand(1, $limit);

        return $this->render(
            'GighubApplicationBundle:Random:index.html.twig',
            array('number' => $number, "limit" => $limit)
        );
    }
}