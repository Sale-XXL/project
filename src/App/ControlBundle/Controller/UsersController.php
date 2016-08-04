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
    public function addAction()
    {
        return array();
    }

}
