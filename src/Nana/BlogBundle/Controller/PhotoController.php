<?php

namespace Nana\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PhotoController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('NanaBlogBundle:Default:photo.html.twig');
    }
}


?>
