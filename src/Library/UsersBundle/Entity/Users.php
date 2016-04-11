<?php
/**
 * Sale XXL
 *
 * Library Users bundle
 * Users entity
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace Library\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Library\UsersBundle\LibraryUsersBundle
 *
 * Class Users
 * @package Library\UsersBundle\Entity
 *
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Library\UsersBundle\Repository\Users")
 * @ORM\HasLifecycleCallbacks
 *
 */
class Users
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    protected $email;

    protected $login;

    protected $role;

    protected $firstName;

    protected $lastName;

    protected $createdAt;

    protected $updateAt;

    protected $deleted;


}
