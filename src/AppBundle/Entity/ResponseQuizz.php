<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResponseQuizz
 *
 * @ORM\Table(name="response_quizz", indexes={@ORM\Index(name="fk_ResponseQuizz_Questions1_idx", columns={"question_id"}), @ORM\Index(name="fk_ResponseQuizz_Responses1_idx", columns={"responses_id"}), @ORM\Index(name="fk_ResponseQuizz_Quizz1_idx", columns={"quizz_id"}), @ORM\Index(name="fk_ResponseQuizz_internaute1_idx", columns={"internaute_id"})})
 * @ORM\Entity
 */
class ResponseQuizz
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
     * @ORM\Column(name="custom", type="text", length=255, nullable=true)
     */
    private $custom;

    /**
     * @var \Question
     *
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
     */
    private $question;

    /**
     * @var \Response
     *
     * @ORM\ManyToOne(targetEntity="Response")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responses_id", referencedColumnName="id")
     * })
     */
    private $responses;

    /**
     * @var \Quizz
     *
     * @ORM\ManyToOne(targetEntity="Quizz")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="quizz_id", referencedColumnName="id")
     * })
     */
    private $quizz;

    /**
     * @var \Surfer
     *
     * @ORM\ManyToOne(targetEntity="Surfer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="internaute_id", referencedColumnName="id")
     * })
     */
    private $internaute;



    /**
     * Set custom
     *
     * @param string $custom
     *
     * @return ResponseQuizz
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;

        return $this;
    }

    /**
     * Get custom
     *
     * @return string
     */
    public function getCustom()
    {
        return $this->custom;
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
     * Set internaute
     *
     * @param \AppBundle\Entity\Surfer $internaute
     *
     * @return ResponseQuizz
     */
    public function setInternaute(\AppBundle\Entity\Surfer $internaute = null)
    {
        $this->internaute = $internaute;

        return $this;
    }

    /**
     * Get internaute
     *
     * @return \AppBundle\Entity\Surfer
     */
    public function getInternaute()
    {
        return $this->internaute;
    }

    /**
     * Set quizz
     *
     * @param \AppBundle\Entity\Quizz $quizz
     *
     * @return ResponseQuizz
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

    /**
     * Set responses
     *
     * @param \AppBundle\Entity\Response $responses
     *
     * @return ResponseQuizz
     */
    public function setResponses(\AppBundle\Entity\Response $responses = null)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Get responses
     *
     * @return \AppBundle\Entity\Response
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return ResponseQuizz
     */
    public function setQuestion(\AppBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
