<?php

namespace AppBundle\Controller;

use AppBundle\Form\LoginType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\RestBundle\Util\Codes;

class AuthController extends FOSRestController
{
    public function postAuthAction(Request $request)
    {
        $form = $this->createForm(new LoginType());

        $form->handleRequest($request);

        if ($form->isValid() === false) {
            $view = View::create()
                ->setStatusCode(Codes::HTTP_BAD_REQUEST)
                ->setData([
                    'form' => $form,
                ]);
            return $this->handleView($view);
        }

        // processing

        $view = $this->view(['status' => 'ok'], 201);
        return $this->handleView($view);

    }
}
