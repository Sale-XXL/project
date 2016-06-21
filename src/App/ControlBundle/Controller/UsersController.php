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
        return array();
    }

}
