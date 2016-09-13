<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * Users controller
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace App\ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

use App\ControlBundle\Form\Type\UserEdit as UserEditForm;
use Library\UsersBundle\Entity\Users;

/**
 * App\ControlBundle\Controller\UsersController
 *
 * Class UsersController
 * @package App\ControlBundle\Controller
 *
 *
 * @Security("has_role('ROLE__SUPER_ADMIN')")
 *
 */
class UsersController extends Controller
{

    /**
     * @Template()
     *
     * @return array
     */
    public function listAction()
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $usersRepository = $em->getRepository('LibraryUsersBundle:Users');
        $users = $usersRepository->findAll();

        return array(
            'users' => $users
        );
    }

    /**
     * @Template()
     *
     * @return array
     */
    public function addAction(Request $request)
    {
        $user = new Users();
        $form = $this->createForm(UserEditForm::class, $user);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ) {

            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->addRole( $user->getRole() );

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('control_users_list');
        }

        return array(
            'form' => $form->createView(),
        );
    }

}
