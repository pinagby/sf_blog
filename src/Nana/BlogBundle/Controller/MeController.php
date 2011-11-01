<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Nana\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nana\BlogBundle\Entity\Member;
use Symfony\Component\HttpFoundation\Request;


class MeController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('NanaBlogBundle:Default:aboutme.html.twig');
    }
    
    public function editAction(){
        
    }
}

?>
