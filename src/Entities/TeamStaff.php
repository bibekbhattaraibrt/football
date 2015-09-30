<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class TeamStaff.
 *
 * @ORM\Entity
 * @ORM\Table(name="staff_associations")
 */
class TeamStaff
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Monks\Entities\Staff", inversedBy="teamStaffs")
     * @ORM\JoinColumn(name="staff_id", referencedColumnName="id", nullable=false)
     */
    protected $staffs;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Monks\Entities\Team", inversedBy="teamStaffs")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=false)
     */
    protected $teams;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $role;

    /**
     *
     */
    public function __construct()
    {
        $this->staffs = new ArrayCollection();
        $this->teams = new ArrayCollection();
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
     * @return mixed
     */
    public function getStaffs()
    {
        return $this->staffs;
    }

    /**
     * @param mixed $staffs
     */
    public function setStaffs($staffs)
    {
        $this->staffs = $staffs;
    }

    /**
     * @return mixed
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param mixed $teams
     */
    public function setTeams($teams)
    {
        $this->teams = $teams;
    }
}
