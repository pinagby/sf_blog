<?php

namespace Nana\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * AboutMe controller.
 *
 * @Route("/photo")
 */
class PhotoController extends Controller
{
    /**
    *
    * @Route("/", name="photo")
    * @Template()
    */
    public function indexAction()
    {
        return array();
    }
}


?>
