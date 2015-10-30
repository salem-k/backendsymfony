<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Form\QuizzType;
use AppBundle\Form\QuestionType;
use AppBundle\Form\ResponseType;

use AppBundle\Entity\Quizz;
use AppBundle\Entity\Response;
use AppBundle\Entity\Question;

use Doctrine\Common\Collections\ArrayCollection;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();
      $Quizzs = $em->getRepository('AppBundle:Quizz')->findAll();
        return array(
                'Quizzs' => $Quizzs
        );
    }
    /**
     * @Route("/", name="login")
     * @Template()
     */
    public function loginAction()
    {
      echo 'TESTTT';
      die;
        return array(
                'Quizzs' => $Quizzs
        );
    }
}
