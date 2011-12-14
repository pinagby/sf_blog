<?php
namespace Nana\BlogBundle\Service;

use Doctrine\ORM\EntityManager;

use Nana\BlogBundle\Entity\Members;
use Nana\BlogBundle\Entity\Diary;
use Nana\BlogBundle\Entity\DiaryCategory;

class AccountService
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em=$em;
    }
    
    public function checkLogin(){
        //exit("ffff");
    }
}
?>
