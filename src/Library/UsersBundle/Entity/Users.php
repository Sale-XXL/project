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
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Library\UsersBundle\Entity\Users
 *
 * Class Users
 * @package Library\UsersBundle\Entity
 *
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Library\UsersBundle\Repository\Users")
 * @ORM\HasLifecycleCallbacks
 *
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 *
 */
class Users implements UserInterface
{

    const ROLE__SUPER_ADMIN     = 'ROLE__SUPER_ADMIN';
    const ROLE__ADMIN           = 'ROLE__ADMIN';
    const ROLE__COMPANY_ADMIN   = 'ROLE__COMPANY_ADMIN';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=32, unique=true)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min = 4, max = 30)
     * @Assert\Regex(
     *     pattern="/^[а-яёa-z0-9-_]+$/ui",
     *     message="property.invalid_symbol.letters_digits_dash_underscore"
     * )
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank()
     * @Assert\Email(checkMX = true)
     */
    protected $email;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min = 4, max = 20)
     */
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    protected $salt;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    protected $roles;

    /**
     * @var string
     */
    protected $role;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="first_name", length=32)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, max = 30)
     * @Assert\Regex(
     *     pattern="/^[а-яёa-z-]+$/ui",
     *     message="property.invalid_symbol.letters_dash"
     * )
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="last_name", length=32, nullable=true)
     *
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, max = 30)
     * @Assert\Regex(
     *     pattern="/^[а-яёa-z-]+$/ui",
     *     message="property.invalid_symbol.letters_dash"
     * )
     */
    protected $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updateAt;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $deleted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt;


    public function __construct()
    {
        $this->salt = md5(uniqid(null, true));
        $this->roles = array();
        $this->enabled = true;
        $this->deleted = false;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $password
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $role
     * @return Users
     */
    public function addRole($role)
    {
        $roles = $this->getRoles();
        if ( !in_array($role, $roles, true) ) {
            $roles[] = $role;
            $this->roles = serialize($roles);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return ($this->roles) ? (array)unserialize($this->roles) : array();
    }

    /**
     * @return null|string
     */
    public function getUserRolesList()
    {
        $list = null;
        if ( $this->getRoles() ) {
            $list = implode( ', ', $this->getRoles() );
        }

        return $list;
    }

    /**
     * @param array $roles
     * @return Users
     */
    public function setRoles(array $roles)
    {
        $this->roles = serialize($roles);
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param string $preset
     * @return array
     */
    public static function getAllRolesListNames($preset = '')
    {
        $list = array(
            $preset . 'super_admin' => self::ROLE__SUPER_ADMIN,
            $preset . 'admin' => self::ROLE__ADMIN,
            $preset . 'company_admin' => self::ROLE__COMPANY_ADMIN,
        );

        return $list;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     * @return Users
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Users
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Users
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Users
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param \DateTime $updateAt
     * @return Users
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param boolean $deleted
     * @return Users
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     * @return Users
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function eraseCredentials()
    {

    }

    public function getName()
    {
        return 'role';
    }

}
