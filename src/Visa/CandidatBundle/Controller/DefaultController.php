<?php

namespace Visa\CandidatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CandidatBundle:Default:index.html.twig');
    }
    
    public function wlcAction($id) {
        return $this->render('CandidatBundle:Default:wlcPage.html.twig', array('name' => $id));
    }
    
}
