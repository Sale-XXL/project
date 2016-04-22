<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * Login form
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace App\ControlBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * App\ControlBundle\Form\Type\Login
 *
 * Class Login
 * @package App\ControlBundle\Form\Type
 */
class Login extends AbstractType
{

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', TextType::class)
            ->add('password', PasswordType::class)
            ->add('save', SubmitType::class, array(
                'label' => 'Create Task'
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'login_form';
    }

}
