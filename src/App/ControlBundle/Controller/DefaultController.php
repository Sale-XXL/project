<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * Default controller
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
 * App\ControlBundle\Controller\DefaultController
 *
 * Class DefaultController
 * @package App\ControlBundle\Controller
 *
 *
 * @Security("has_role('ROLE__SUPER_ADMIN')")
 *
 */
class DefaultController extends Controller
{

    /**
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        return array();
    }

}
