<?php 
namespace App\Controller;
use App\Entity\Penality;
use App\Entity\Company;
use App\Form\PenalityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PenalityController extends AbstractController
{
    /**
     * @Route("main2" , name="main2")
     */
    public function index(): Response
    {
        $data=$this->getDoctrine()->getRepository(Penality::class)->findAll();
        return $this->render('Penality/index.html.twig', [
        'list'=>$data
        ]);
    }
/**
* @Route("createPenality" , name="createPenality")
*/
    public function createPenality(Request $request){
        $penality=new Penality();
        $form=$this->createForm(PenalityType::class,$penality);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($penality);
            $em->flush();

            $this->addFlash('notice','Submitted successfully!!');
        }
        return $this->render('Penality/createPenality.html.twig',[
            'form'=>$form->createView()
        ]);
    }
    /**
 * @Route("updatePenality/{id}" , name="updatePenality")
 */
public function updatePenality (Request $request , $id){
    $pen=$this->getDoctrine()->getRepository(Penality::class)->find($id);
    $form=$this->createForm(PenalityType::class, $pen);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($pen);
        $em->flush();

        $this->addFlash('notice','updated successfully');
return $this->redirectToRoute('main2');
    }
    return $this->render('Penality/updatePenality.html.twig',[
    'form' => $form->createView()


    ]);}

    /**
 * @Route("DeletePenality/{id}", name="DeletePenality")
*/
function DeletePenality($id){
    
    $data=$this->getDoctrine()->getRepository(Penality::class)->find($id);
    
        $em=$this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice','deleted successfully');


    return $this->render('main2');
}
}