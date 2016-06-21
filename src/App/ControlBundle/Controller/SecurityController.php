<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * Security controller
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace App\ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Library\UsersBundle\Entity\Users;
use App\ControlBundle\Form\Type\Login as LoginForm;

/**
 * App\ControlBundle\Controller\SecurityController
 *
 * Class SecurityController
 * @package App\ControlBundle\Controller
 */
class SecurityController extends Controller
{

    /**
     * @Template()
     *
     * @return array
     */
    public function loginAction(Request $request)
    {
        if ( $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') ) {
            return $this->redirectToRoute('control_default');
        }

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return array(
            'last_username' => $lastUsername,
            'error'         => $error,
        );
    }

}