<?php
/**
 * Sale XXL
 *
 * Application Control bundle
 * Menu Main service
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace App\ControlBundle\Service;

use Symfony\Component\Yaml\Yaml;

/**
 * App\ControlBundle\Service\MenuMain
 *
 * Class MenuMain
 * @package App\ControlBundle\Service
 */
class MenuMain
{


    public function createMenu()
    {

        $menu = array(
            'home' => array(
                'route' => 'control_default'
            )
        );
    }

    public function menu()
    {

        $file = __DIR__.'/../Resources/config/menu.yml';
        $menuYml = Yaml::parse(file_get_contents($file));


        var_dump($menuYml);



        $menu = array(
            array('name' => 'home', 'route' => 'control_default'),
            array('name' => 'companies'),
            array('name' => 'shops'),
            array('name' => 'users')
        );

        return $menu;
    }

}
