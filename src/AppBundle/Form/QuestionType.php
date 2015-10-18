<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionType extends AbstractType
{
    private $quizz;
    
    public function __construct($quizz)
    {
        $this->quizz = $quizz;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
            ->add('type','choice', array(
                    'choices' => array(
                        'Option'   => 'Radio',
                        'Checkbox' => 'Checkbox'
                    ),
                    'required' => true
                ))
            ->add('minCheck')
            //->add('quizz')
            ->add('quizz','entity', array(
                'empty_value' => 'Select a Quizz',
                'class' => 'AppBundle:Quizz',
                'data' => $this->quizz
            ));
                    //,$option['quizzId'];
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_question';
    }
}
