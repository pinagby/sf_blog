<?php

namespace Nana\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nana\BlogBundle\form\MembersType;
use Nana\BlogBundle\form\LoginType;
use Nana\BlogBundle\Entity\Members;


use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('NanaBlogBundle:Default:index.html.twig');
    }
       
    public function newAction(){
        
        $member = new Members();
        $request = $this->getRequest();
       
        $form = $this->createForm(new MembersType(), $member);
                
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($member);
                $em->flush();
                return $this->render('NanaBlogBundle:Default:new_suc.html.twig');
            }
        }

        return $this->render('NanaBlogBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));        
    }
    
    public function loginAction(){
        global $login;
        $member = new Members();
        $request = $this->getRequest();
        $session = $request->getSession();
        $form = $this->createForm(new LoginType(),$member);        
        
        if ($request->getMethod() == 'POST') 
        {
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
                    return $this->render('NanaBlogBundle:Default:index.html.twig');
                }else{
                    echo "<script>alert('密码错误')</script>";                    
                }
            }
            
        }
        return $this->render('NanaBlogBundle:Default:login.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function logoutAction()
    {
        $session=$this->get('session');
        $session->remove('user');
        return $this->render('NanaBlogBundle:Default:index.html.twig');
    }
    
    public function showAction()
    {
        
    }
    
}
