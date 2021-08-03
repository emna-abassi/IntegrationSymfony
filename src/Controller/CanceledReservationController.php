<?php

namespace App\Controller;
use App\Entity\CanceledReservation;
use App\Form\CanceledReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CanceledReservationController extends AbstractController
{
    /**
     * @Route("main5",name="main5")
     */
    
    public function index(): Response
    {
        $data=$this->getDoctrine()->getRepository(CanceledReservation::class)->findAll();
        return $this->render('canceled_reservation/index.html.twig', [
        'list'=>$data
        ]);
    }
    /**
     * @Route("createCancelReservation" , name="createCanceledReservation")
     */
    public function createCanceledReservation(Request $request){
        $cancel = new CanceledReservation();
        $form=$this->createForm(CanceledReservationType::class, $cancel);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($cancel);
            $em->flush();
            $this->addFlash('notice','Submitted successfully!!');
        
        }
        
        return $this->render('canceled_reservation\canceledReservation.html.twig',[
            'form'=>$form->createView()
        ]);
    }
    
    /**
     * @Route("UpdateCancel/{id}" , name="updateCancel")
     */

    public function updateCancel (Request $request , $id){
        $cancel=$this->getDoctrine()->getRepository(CanceledReservation::class)->find($id);
        $form=$this->createForm(CanceledReservationType::class, $cancel);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($cancel);
            $em->flush();
    
            $this->addFlash('notice','updated successfully');
    return $this->redirectToRoute('main5');
        }
        return $this->render('canceled_reservation/updateCancel.html.twig',[
        'form' => $form->createView()
    
    
        ]);}
    
    /**
     * @Route("DeleteCancel/{id}", name="DeleteCancel")
    */
    function DeleteCancel($id){
        
        $data=$this->getDoctrine()->getRepository(CanceledReservation::class)->find($id);
        
            $em=$this->getDoctrine()->getManager();
            $em->remove($data);
            $em->flush();
    
            $this->addFlash('notice','deleted successfully');
    
    
        return $this->render('main5');
    
    
    
    
    
    
    
    }
}
