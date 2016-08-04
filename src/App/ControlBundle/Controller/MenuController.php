<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * Menu controller
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace App\ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Yaml\Yaml;

/**
 * App\ControlBundle\Controller\MenuController
 *
 * Class MenuController
 * @package App\ControlBundle\Controller
 */
class MenuController extends Controller
{

    /**
     * @Template()
     *
     * @param string $nameController
     * @return array
     */
    public function mainAction($nameController)
    {
        $file = __DIR__.'/../Resources/config/menu.yml';
        $menu = Yaml::parse(file_get_contents($file));
        $mainMenu = $menu['main_menu'];

        $pathController = explode('::', $nameController);
        $arrPath = explode("\\", $pathController[0]);
        $controllerName = array_pop($arrPath);
        $controllerName = str_replace('Controller', '', $controllerName);

        return array(
            'mainMenu' => $mainMenu,
            'currentControllerName' => $controllerName
        );
    }

    /**
     * @Template()
     *
     * @return array
     */
    public function leftAction($nameController)
    {
        $leftMenu = $this->getConfigs('left_menu');
        $controllerName = $this->getControllerName($nameController);

        return array(
            'leftMenu' => isset( $leftMenu[$controllerName] ) ? $leftMenu[$controllerName] : null,
            'currentActionName' => $this->getActionName($nameController),
        );
    }

    /**
     * @param string $name
     * @return array
     */
    protected function getConfigs($name)
    {
        $file = __DIR__.'/../Resources/config/menu.yml';
        $menu = Yaml::parse(file_get_contents($file));

        return $menu[$name];
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getControllerName($name)
    {
        $pathController = explode('::', $name);
        $arrPath = explode("\\", $pathController[0]);
        $controllerName = array_pop($arrPath);
        $controllerName = str_replace('Controller', '', $controllerName);

        return $controllerName;
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getActionName($name)
    {
        $actionName = explode('::', $name);
        $actionName = str_replace('Action', '', $actionName[1]);

        return $actionName;
    }

}
