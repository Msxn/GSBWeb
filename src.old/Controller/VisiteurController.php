<?php

namespace App\Controller;
use App\Entity\Visiteur;
use App\Form\VisiteurType;
use App\Entity\FicheFrais;
use App\Form\FicheFraisType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class VisiteurController extends AbstractController
{

//    /**
//     * @Route("/visiteur", name="visiteur")
//     */
//    public function index()
//    {
//        if($this->get('session')->get('id') != ''){
//            return $this->render('visiteur/index.html.twig', [
//                'controller_name' => 'VisiteurController',
//            ]);
//        }else{
//            return $this->redirectToRoute('visiteur_connect');
//        }
//    }
   
    /**
     * @Route("/loginVisiteur", name="visiteur_connect")
     */
    public function connectionVisiteur(Request $query, Session $session)
    {
        $visiteur = new Visiteur;
        $form = $this->createForm(VisiteurType::class, $visiteur);
        $form->handleRequest($query);
    if ($form->isSubmitted() && $form->isValid()) {
       
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();      
           
            $login = $form['login']->getData();
            $password = $form['mdp']->getData();
           
            $v = $em->getRepository(Visiteur::class)->seConnecter($login,$password); //on envoie les données reçus pour tester

            foreach ($v as $result){
            if($v[0]->getLogin()==$login){ 
            
               
               $session ->set('nom', $v[0]->getNom());
               $session ->set('prenom', $v[0]->getPrenom());
               $login = $session->set('login', $login);
                
               return $this->redirectToRoute('session_v');            
            }    
            }
    
    }
    return $this->render('visiteur/loginVisiteur.html.twig',array('form'=>$form->createView()));
}


   /**
     * @Route("/accueil", name="session_v")
     */
   
    public function testerSessionVisiteur(){
        return $this->render('visiteur/index.html.twig');
    }
     


   

}


/**
     * @Route("/CalsaisirFF", name="add_ffMontant")
    */ 
