<?php
namespace Nana\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nana\BlogBundle\Entity\Diary;
use Nana\BlogBundle\form\DiaryType;

class DiaryController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('NanaBlogBundle:Diary')->findAll();
        
        return $this->render('NanaBlogBundle:Default:diary.html.twig',array(
            'entity' =>$entities
        ));
    }
    
    /**
     * Displays a form to create a new diary.
     *
     * @Route("Nana/diary/new", name="new_diary")
     * @Template("NanaBlogBundle:Diary:new.html.twig")
     */
    public function newAction(){
        $entity = new Diary();
        $date = date_create(date("F j, Y, g:i a"));
        $entity->setDate($date);
        $form   = $this->createForm(new DiaryType(),$entity);
        
        $request = $this->getRequest();
        $form->bindRequest($request);
        
        if($form->isValid()){
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();
            
            $entities = $em->getRepository('NanaBlogBundle:Diary')->findAll();
            
            return $this->render('NanaBlogBundle:Default:diary.html.twig',array(
                'entity' =>$entities
            ));
        }
        
        return array(
            'form'   =>$form->createView()
        );
    }
    
    public function editAction($id){
        
    }
    
    /**
     * Displays a form to create a new diary.
     *
     * @Route("Nana/diary/show/{id}", name="show_diary")
     * @Template("NanaBlogBundle:Diary:show.html.twig")
     */
    public function showAction($id){
        
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('NanaBlogBundle:Diary')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }
        
        //$deleteForm = $this->createDeleteForm($id);
        
        return array(
            'entity'      => $entity,
            //'delete_form' => $deleteForm->createView()
        );
    }
    
    public function deletAction($id){
        
    }
}

?>
