<?php

namespace App\Controller;
use App\Entity\Company;
use App\Form\CompanyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CompanyTypeController extends AbstractController
{
    /**
     * @Route("main" , name="main")
     */
    public function index():Response 
    {
       
        $data=$this->getDoctrine()->getRepository(Company::class)->findAll();
        
      return $this->render('company_type/index.html.twig',[
          'list'=>$data
      ]);
  }
   
     


     /**
     * @Route("create" , name="create")
     */
    public function create(Request $request){
$company = new Company();
$form=$this->createForm(CompanyType::class, $company);
$form->handleRequest($request);
if ($form->isSubmitted()&& $form->isValid()){
    $em=$this->getDoctrine()->getManager();
    $em->persist($company);
    $em->flush();
    $this->addFlash('notice','Submitted successfully!!');

}

return $this->render('company_type/create.html.twig',[
    'form'=>$form->createView()
]);
    }
   /**
 * @Route("update/{id}" , name="update")
 */
public function update (Request $request , $id){
    $company=$this->getDoctrine()->getRepository(Company::class)->find($id);
    $form=$this->createForm(CompanyType::class, $company);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($company);
        $em->flush();

        $this->addFlash('notice','Company updated successfully !!');
return $this->redirectToRoute('main');
    }
    return $this->render('company_type/update.html.twig',[
    'form' => $form->createView()


    ]);}

/**
 * @Route("Delete/{id}", name="Delete")
*/
public function Delete($id){
    
    $data=$this->getDoctrine()->getRepository(Company::class)->find($id);
    
        $em=$this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice','deleted successfully');


    return $this->render('company_type/index.html.twig');

}
}

  

