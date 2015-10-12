<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Contracts\Permission;
use Doctrine\Common\Collections\ArrayCollection;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;

/**
 * Class Role
 * @package Monks\Entities
 *
 * @ORM\Entity()
 * @ORM\Table(name="roles")
 */
class Role implements RoleContract
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $permission
     *
     * @return bool
     */
    public function hasPermissionTo($permission)
    {
        // TODO: Implement hasPermissionTo() method.
    }

    /**
     * @return ArrayCollection|Permission[]
     */
    public function getPermissions()
    {
        // TODO: Implement getPermissions() method.
    }


}
