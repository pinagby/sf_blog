<?php
namespace Nana\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;
use Nana\BlogBundle\Entity\Diary;
use Nana\BlogBundle\Form\DiaryType;
use Nana\BlogBundle\Entity\DiaryCategory;
use Nana\BlogBundle\Form\DiaryCategoryType;
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;

/**
 * Diary controller.
 *
 * @Route("/diary")
 */
class DiaryController extends Controller
{
   /**
    *
    * @Route("/{page}",defaults={"page"=1} , name="diary")
    * @Template()
    */ 
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $diary = $em->getRepository('NanaBlogBundle:Diary')->findAll();
        $diarycat = $em->getRepository('NanaBlogBundle:DiaryCategory')->findAll();
       
        $qb = $em->getRepository('NanaBlogBundle:Diary')->createQueryBuilder('f');
        $adapter = new DoctrineOrmAdapter($qb);
        $pager = new Pager($adapter, array('page' => $page, 'limit' => 6));
        
        return array(
            'diarys' =>$diary,
            'diarycats' =>$diarycat,
            'pager' => $pager,
        );
    }
    
    /**
     * Create a form to create a new diary.
     *
     * @Route("/new/", name="new_diary")
     * @Template("NanaBlogBundle:Diary:new.html.twig")
     */
    public function newAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $session=$this->get('session');
        $date = date_create(date("F j, Y, g:i a"));
        $author = $session->get('user');
        
        $entity = new Diary(); 
        $entity->setDate($date);
        $entity->setAuthor($author);
        
        $form   = $this->createForm(new DiaryType(),$entity);
        $form->bindRequest($request);
        
        if($form->isValid()){
            $em->persist($entity);
            $em->flush();
            
            $diary = $em->getRepository('NanaBlogBundle:Diary')->findAll();
            $diarycat = $em->getRepository('NanaBlogBundle:DiaryCategory')->findAll();
            
            return array(
                'diarys' =>$diary,
                'diarycats'=>$diarycat
            );
        }
        
        return array(
            'form'   =>$form->createView()
        );
    }
    /**
     * Edit a form to create a new diary.
     *
     * @Route("/edit/", name="new_diary")
     * @Template()
     */
    public function editAction($id){
        
    }
    
    /**
     * Displays a form to create a new diary.
     *
     * @Route("/show/{id}", name="show_diary")
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
    
    /**
     * Create a form to create a new diary category.
     *
     * @Route("/new_cat/", name="new_diarycat")
     * @Template("NanaBlogBundle:DiaryCategory:new_cat.html.twig")
     */
    public function newCatAction(){
        $diarycat = new DiaryCategory();
        
        $em = $this->getDoctrine()->getEntityManager();
        $diary = $em->getRepository('NanaBlogBundle:Diary')->findAll();
        
        $createtime = date_create(date("F j, Y, g:i a"));
        $diarycat->setCreatetime($createtime);
        $form   = $this->createForm(new DiaryCategoryType(),$diarycat);
        
        $request = $this->getRequest();        
        $form->bindRequest($request);
        
        if($form->isValid()){
            $em->persist($diarycat);
            $em->flush();
            
            $diarycats = $em->getRepository('NanaBlogBundle:DiaryCategory')->findAll();
            
            return array(
                'diarys' =>$diary,
                'diarycats'=>$diarycats
            );
        }
        
        return array(
            'form'   =>$form->createView()
        );
    }
}

?>
