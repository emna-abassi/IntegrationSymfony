<?php

namespace App\Controller;
use App\Entity\UserQuality;
use App\Form\UserQualityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserQualityController extends AbstractController
{
   /**
     * @Route("main3" , name="main3")
     */
    public function index(): Response
    {
        $data=$this->getDoctrine()->getRepository(UserQuality::class)->findAll();
        return $this->render('user_quality/index.html.twig', [
        'list'=>$data
        ]);
    }
/**
     * @Route("createUser" , name="createUser")
     */
    public function createUser(Request $request){
        $user = new UserQuality();
        $form=$this->createForm(UserQualityType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('notice','Submitted successfully!!');
        
        }
        
        return $this->render('user_quality/createUser.html.twig',[
            'form'=>$form->createView()
        ]);
            }
        
/**
 * @Route("updateUser/{id}" , name="updateUser")
 */
public function updateUser (Request $request , $id){
    $user=$this->getDoctrine()->getRepository(UserQuality::class)->find($id);
    $form=$this->createForm(UserQualityType::class, $user);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $this->addFlash('notice','updated successfully');
return $this->redirectToRoute('main3');
    }
    return $this->render('user_quality/updateUser.html.twig',[
    'form' => $form->createView()


    ]);}

/**
 * @Route("DeleteUser/{id}", name="DeleteUser")
*/
function DeleteUser($id){
    
    $data=$this->getDoctrine()->getRepository(UserQuality::class)->find($id);
    
        $em=$this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice','deleted successfully');


    return $this->render('main3');







}
}