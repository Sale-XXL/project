<?php
/**
 * Sale XXL
 *
 * Library Users repository
 *
 *
 * @author     YURIST.912
 * @copyright  2016
 */
namespace Library\UsersBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Library\UsersBundle\Repository\Users
 *
 * Class Users
 * @package Library\UsersBundle\Repository
 */
class Users extends EntityRepository
{

    const ROLE__SUPER_ADMIN     = 'ROLE__SUPER_ADMIN';
    const ROLE__ADMIN           = 'ROLE__ADMIN';
    const ROLE__COMPANY_ADMIN   = 'ROLE__COMPANY_ADMIN';

}
