<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends FOSRestController
{
    public function postAuthsAction(Request $request)
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        $view = $this->view([$username, $password], 200);
        $view->setTemplate('::default/index.html.twig');
        return $this->handleView($view);
    }
}
