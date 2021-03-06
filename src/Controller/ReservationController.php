<?php

namespace App\Controller;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("main6",name="main6")
     */
    public function index(): Response
    {
        $data=$this->getDoctrine()->getRepository(Reservation::class)->findAll();
        return $this->render('Reservation/index.html.twig', [
        'list'=>$data
        ]);
    }
    /**
     * @Route("createReservation" , name="createReservation")
     */
    public function createReservation(Request $request){
        $reservation = new Reservation();
        $form=$this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            $this->addFlash('notice','Submitted successfully!!');
        
        }
        
        return $this->render('Reservation\createReservation.html.twig',[
            'form'=>$form->createView()
        ]);
    }
    /**
 * @Route("updateReservation/{id}" , name="updateReservation")
 */
public function updateReservation (Request $request , $id){
    $res=$this->getDoctrine()->getRepository( Reservation::class)->find($id);
    $form=$this->createForm(ReservationType::class, $res);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($res);
        $em->flush();

        $this->addFlash('notice','updated successfully');
return $this->redirectToRoute('main6');
    }
    return $this->render('Reservation/updateReservation.html.twig',[
    'form' => $form->createView()


    ]);}
    /**
 * @Route("DeleteReservation/{id}", name="DeleteReservation")
*/
function DeleteReservation($id){
    
    $data=$this->getDoctrine()->getRepository(Reservation::class)->find($id);
    
        $em=$this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice','deleted successfully');


    return $this->render('main6');
}
}
