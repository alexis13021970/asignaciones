<?php

namespace EMM\UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();

        $res = 'Lista de Usuarios <br />';

        foreach($users as $user)
        {
            $res .= 'Usuario: ' . $user->getUsername() . ' Email: ' . $user->getEmail(). ' <br />';
        }



         return new Response($res);

    }

    public function viewAction($nombre)
    {
         $repository = $this->getDoctrine()->getRepository('UserBundle:User');

       //  $user = $repository->find($id);
         $user = $repository->findOneByUsername($nombre);

         Return new Response('Usuario: ' . $user->getUsername(). ' Email: ' .$user->getEmail());

    }
}
