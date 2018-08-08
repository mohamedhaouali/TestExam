<?php

namespace Visa\CandidatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Visa\CandidatBundle\Entity\Candidat;
use Visa\CandidatBundle\Form\CandidatType;

class CandidatController  extends Controller
{
    public function addAction(Request $request){
        $candidat = new Candidat(); // new instance
        $form = $this->createForm(CandidatType::class, $candidat); // formulaire syncrhonisation form avec objet

        $form->handleRequest($request); //Methode de recuperation

        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $candidatExist = $em->getRepository("CandidatBundle:Candidat")->find($candidat->getCin());// recupere candidat par Cin
            if (!$candidatExist){
                $candidat->setEtat("En cours");// etat du candidat
                $em->persist($candidat);//insertion des donnees
                $em->flush();//execution des requetes
                return $this->redirectToRoute("list_candidant");//redirect to afficher candidat
            }


        }

        return $this->render("CandidatBundle:Candidat:add.html.twig",
            array("f"=>$form->createView()));
    } 
    
       public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $candidats = $em->getRepository("CandidatBundle:Candidat")->findAll();
        return $this->render("CandidatBundle:Candidat:list.html.twig",array("can"=>$candidats));
    }
     public function traiterAction(){
        $em = $this->getDoctrine()->getManager();
        $candidats = $em->getRepository("CandidatBundle:Candidat")->findByEtat("En cours");// etat du demande 
        return $this->render("CandidatBundle:Candidat:traitement.html.twig",array("can"=>$candidats));
    }
    
      public function accepterAction($cin){
        $em = $this->getDoctrine()->getManager();
        $candidats = $em->getRepository("CandidatBundle:Candidat")->find($cin);
        $candidats->setEtat("Accepter");// l'adminstrateur va accepter la demande 
        $em->persist($candidats);
        $em->flush();
        return $this->redirectToRoute("traitement_candidat");
    }
    
      public function refuserAction($cin){
        $em = $this->getDoctrine()->getManager();
        $candidats = $em->getRepository("CandidatBundle:Candidat")->find($cin);
        $candidats->setEtat("Refuser");//l'administrateur va refuser la demande
        $em->persist($candidats);
        $em->flush();
        return $this->redirectToRoute("traitement_candidat");
    }
     public function indexAction(){
        return $this->render("CandidatBundle:Candidat:index.html.twig", array());
    }
}
