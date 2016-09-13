<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * User Edit form
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace App\ControlBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Library\UsersBundle\Entity\Users;

/**
 * App\ControlBundle\Form\Type\UserEdit
 *
 * Class Login
 * @package App\ControlBundle\Form\Type
 */
class UserEdit extends AbstractType
{

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array(
                'label' => 'control.forms.label.username'
            ))

            ->add('email', TextType::class)

            ->add('role', ChoiceType::class, array(
                'choices' => Users::getAllRolesListNames('control.users.roles.name.'),
            ))

            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'control.forms.label.password'),
                'second_options' => array('label' => 'control.forms.label.repeatPassword'),
            ))

            ->add('firstName', TextType::class, array(
                'label' => 'control.forms.label.firstName'
            ))

            ->add('lastName', TextType::class, array(
                'label' => 'control.forms.label.lastName'
            ))
            
            ->add('save', SubmitType::class, array(
                'label' => 'control.forms.button.add'
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user_edit_form';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Library\UsersBundle\Entity\Users',
        ));
    }
}
