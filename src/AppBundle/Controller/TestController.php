<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * This controller will help to test requests
 */
class TestController extends FOSRestController
{
    /**
     * @param  Request $request
     * @return Response
     */
    public function postTestAction(Request $request)
    {
        $view = $this->view([
            'data' => $request->request,
            'headers' => $request->headers->all()
        ]);
        return $this->handleView($view);
    }
}