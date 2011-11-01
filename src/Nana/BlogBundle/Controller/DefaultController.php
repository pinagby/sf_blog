<?php

namespace Nana\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
        /*$member->setName("");
        $member->setPassword("");
        $member->setBirthday(new \Datetime());
        $member->setEmail("");
        $member->setSex("");*/
        $form = $this->createForm(new MembersType(), $member);
        /*$form = $this->createFormBuilder($member)
            ->add('name', 'text')
            ->add('password', 'password')
            ->add('birthday', 'date',array('required'=>false,))
            ->add('email', 'email')
            ->add('sex', 'choice',array(
                'choices' => array('m' =>'Male','f'=>'Female'),
                'required' => true,
            ))
            ->getForm();*/
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($member);
                $em->flush();
                //return $this->redirect($this->generateUrl('register_suc'));
                return $this->render('NanaBlogBundle:Default:new_suc.html.twig');
            }
        }

        return $this->render('NanaBlogBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));        
    }
    
    public function loginAction(){
        $request = $this->getRequest();
        $session = $request->getSession();
        
        $form = $this->createForm(new LoginType());        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($member);
                $em->flush();
                //return $this->redirect($this->generateUrl('register_suc'));
                return $this->render('NanaBlogBundle:Default:index.html.twig');
            }
        }
        return $this->render('NanaBlogBundle:Default:login.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function loginCheckAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        echo $request;
        return $this->redirect($this->generateUrl('homepage'));
    }
    
    public function logoutAction()
    {
        
    }
    
    public function showAction()
    {
        
    }
    
}
