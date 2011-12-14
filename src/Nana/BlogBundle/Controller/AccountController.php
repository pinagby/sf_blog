<?php

namespace Nana\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;

use Nana\BlogBundle\Form\MembersType;
use Nana\BlogBundle\Form\LoginType;
use Nana\BlogBundle\Entity\Members;
use Nana\BlogBundle\Entity\Diary;
use Nana\BlogBundle\Form\DiaryType;
use Nana\BlogBundle\Entity\DiaryCategory;
use Nana\BlogBundle\Form\DiaryCategoryType;

use Symfony\Component\HttpFoundation\Request as Request;

class AccountController extends Controller
{
    /**
   * @Route("/register",name="register")
   * @Template()
   */
    public function registerAction(){
        $member = new Members();
        $form = $this->createForm(new MembersType(), $member);
        return  array(
            'form' => $form->createView(),
        );        
    }
  /**
   * @Route("/registerdo",name="registerdo")
   * @Template()
   */
    public function registerdoAction(){
        $member = new Members();
        $form = $this->createForm(new MembersType(), $member);
        
        $request = $this->getRequest();
        $form->bindRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($member);
            $em->flush();
            return $this->redirect($this->generateUrl('login'));
        }

        return array(
            'form' => $form->createView(),
        );        
    }
    
   /**
   * @Route("/login",name="login")
   * @Template()
   */
    public function loginAction(){
        global $login;
        $member = new Members();
        $request = $this->getRequest();
        $session = $request->getSession();
        $form = $this->createForm(new LoginType(),$member);
        return  array(
            'form' => $form->createView(),
        );
    }
    
    /**
   * @Route("/logindo",name="logindo")
   * @Template()
   */
    public function logindoAction(){
        global $login;
        $member = new Members();
        $session = $request->getSession();
        $form = $this->createForm(new LoginType(),$member);        
        
        $request = $this->getRequest();
        $form->bindRequest($request);
        $em = $this->getDoctrine()->getEntityManager();            
        $em->persist($member);

        $repository = $this->getDoctrine()
                ->getRepository('NanaBlogBundle:Members');
        $m = $repository->findOneByName($member->getName());

        if(!$m){
            echo "<script>alert('用户不存在')</script>";                
        }else{
            if($m->getPassword()== $member->getPassword()){
                $session->set('user', $member->getName());
                $diary = $em->getRepository('NanaBlogBundle:Diary')->findAll();
                $diarycat = $em->getRepository('NanaBlogBundle:DiaryCategory')->findAll();

                return $this->render('NanaBlogBundle:Default:index.html.twig',array(
                    'diarys' =>$diary,
                    'diarycats' =>$diarycat
                ));
              }else{
                echo "<script>alert('密码错误')</script>";                    
            }
        }
        
        return $this->render('NanaBlogBundle:Default:login.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
   * @Route("/logout",name="logout")
   * @Template()
   */
    public function logoutAction()
    {
        $session=$this->get('session');
        $session->remove('user');
        
        $em = $this->getDoctrine()->getEntityManager();

        $diary = $em->getRepository('NanaBlogBundle:Diary')->findAll();
        $diarycat = $em->getRepository('NanaBlogBundle:DiaryCategory')->findAll();
        
        return $this->render('NanaBlogBundle:Default:index.html.twig',array(
            'diarys' =>$diary,
            'diarycats' =>$diarycat
        ));
    }
    
}
