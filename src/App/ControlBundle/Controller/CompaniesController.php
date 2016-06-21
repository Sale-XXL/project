<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * Companies controller
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
 * App\ControlBundle\Controller\CompaniesController
 *
 * Class CompaniesController
 * @package App\ControlBundle\Controller
 *
 *
 * @Security("has_role('ROLE__SUPER_ADMIN')")
 *
 */
class CompaniesController extends Controller
{

    /**
     * @return array
     *
     * @Template()
     */
    public function listAction()
    {
        return array();
    }

}
