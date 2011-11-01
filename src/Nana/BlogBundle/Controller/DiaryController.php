<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Nana\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DiaryController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('NanaBlogBundle:Default:diary.html.twig');
    }
}

?>
