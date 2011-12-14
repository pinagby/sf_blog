<?php
namespace Nana\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * AboutMe controller.
 *
 * @Route("/music")
 */
class MusicController extends Controller
{
    /**
    *
    * @Route("/", name="music")
    * @Template()
    */
    public function indexAction()
    {
        return array();
    }
}

?>
