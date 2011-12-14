<?php
namespace Nana\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nana\BlogBundle\Entity\Member;
use Symfony\Component\HttpFoundation\Request;

/**
 * AboutMe controller.
 *
 * @Route("/me")
 */
class MeController extends Controller
{
    /**
    *
    * @Route("/", name="me")
    * @Template()
    */
    public function indexAction()
    {
        return array();
    }
    
    public function editAction(){
        
    }
}

?>
