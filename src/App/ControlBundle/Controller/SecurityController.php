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
    public function loginAction()
    {
        return array();
    }

}