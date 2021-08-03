<?php

namespace App\Controller;
use App\Entity\Feedback;
use App\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class FeedbackController extends AbstractController
{
 /**
     * @Route("main4" , name="main4")
     */
    public function index(): Response
    {
        $data=$this->getDoctrine()->getRepository(Feedback::class)->findAll();
        return $this->render('Feedback/index.html.twig', [
        'list'=>$data
        ]);
    }
   
     /**
     * @Route("createFeedbackk" , name="createFeedbackk")
     */
    public function createFeedback(Request $request){
        $feed=new Feedback();
        $form=$this->createForm(FeedbackType::class ,$feed);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($feed);
            $em->flush();

            $this->addFlash('notice','submitted successfully');
        }
        return $this->render('Feedback\createFeedback.html.twig',[
            'form'=>$form->createView()
        ]);
    }
    /**
 * @Route("updateFeedback/{id}" , name="updateFeedback")
 */
public function updateFeedback (Request $request , $id){
    $feed=$this->getDoctrine()->getRepository(Feedback::class)->find($id);
    $form=$this->createForm(FeedbackType::class, $feed);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($feed);
        $em->flush();

        $this->addFlash('notice','updated successfully');
return $this->redirectToRoute('main4');
    }
    return $this->render('Feedback/updateFeed.html.twig',[
    'form' => $form->createView()


    ]);}

/**
 * @Route("DeleteFeedback/{id}", name="DeleteFeedback")
*/
function DeleteFeedback($id){
    
    $data=$this->getDoctrine()->getRepository(Feedback::class)->find($id);
    
        $em=$this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice','deleted successfully');


    return $this->render('user_quality');







}
}
