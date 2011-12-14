<?php

namespace Nana\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nana\BlogBundle\Form\MembersType;
use Nana\BlogBundle\Form\LoginType;
use Nana\BlogBundle\Entity\Members;
use Nana\BlogBundle\Entity\Diary;
use Nana\BlogBundle\Form\DiaryType;
use Nana\BlogBundle\Entity\DiaryCategory;
use Nana\BlogBundle\Form\DiaryCategoryType;


use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\Security\Core\SecurityContext;


class DefaultController extends Controller
{
    /**
   * @Route("/",name="homepage")
   * @Template()
   */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $diary = $em->getRepository('NanaBlogBundle:Diary')->findAll();
        $diarycat = $em->getRepository('NanaBlogBundle:DiaryCategory')->findAll();
        
        return array(
            'diarys' =>$diary,
            'diarycats' =>$diarycat
        );
    }
}
