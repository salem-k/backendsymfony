<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="fk_Questions_Quizz_idx", columns={"quizz_id"})})
 * @ORM\Entity
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="min_check", type="integer", nullable=true)
     */
    private $minCheck;

    /**
     * @var \Quizz
     *
     * @ORM\ManyToOne(targetEntity="Quizz",fetch="EAGER",inversedBy="questions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="quizz_id", referencedColumnName="id")
     * })
     */
    private $quizz;

     /**
     * @ORM\OneToMany(targetEntity="Response",mappedBy="question", fetch="EAGER")
     */
    private $responses;

    public function __construct() {
        $this->responses = new ArrayCollection();
    }
    /**
     * Get $responses
     *
     * @return string
     */
    public function getResponses()
    {
        return $this->responses;
    }
    /**
     * Set content
     *
     * @param string $content
     *
     * @return Question
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set minCheck
     *
     * @param integer $minCheck
     *
     * @return Question
     */
    public function setMinCheck($minCheck)
    {
        $this->minCheck = $minCheck;

        return $this;
    }

    /**
     * Get minCheck
     *
     * @return integer
     */
    public function getMinCheck()
    {
        return $this->minCheck;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quizz
     *
     * @param \AppBundle\Entity\Quizz $quizz
     *
     * @return Question
     */
    public function setQuizz(\AppBundle\Entity\Quizz $quizz = null)
    {
        $this->quizz = $quizz;

        return $this;
    }

    /**
     * Get quizz
     *
     * @return \AppBundle\Entity\Quizz
     */
    public function getQuizz()
    {
        return $this->quizz;
    }
    public function __toString(){
      return $this->content;
    }    
}
