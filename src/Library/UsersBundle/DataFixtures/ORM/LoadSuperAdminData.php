<?php
/**
 * Sale XXL
 *
 * Library Users bundle
 * Load Super Admin data fixtures
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace Library\UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Library\UsersBundle\Entity\Users;
use Library\UsersBundle\Repository\Users as UsersRepository;

/**
 * Library\UsersBundle\DataFixtures\ORM\LoadSuperAdminData
 *
 * Class LoadSuperAdminData
 * @package Library\UsersBundle\DataFixtures\ORM
 */
class LoadSuperAdminData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $superAdmin = new Users();
        $superAdmin
            ->setEmail('salexxl.ru@gmail.com')
            ->setUsername('SuperAdmin')
            ->setFirstName('Super')
            ->setLastName('Admin')
            ->addRole(UsersRepository::ROLE__SUPER_ADMIN)
        ;

        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($superAdmin, '111111');
        $superAdmin->setPassword($password);

        $manager->persist($superAdmin);
        $manager->flush();
    }

}
