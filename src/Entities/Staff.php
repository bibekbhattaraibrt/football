<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Staff
 *
 * @ORM\Entity
 * @ORM\Table(name="staffs")
 **/
class Staff
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $shortBio = '';

    /**
     *
     *  @ORM\OneToMany(targetEntity="Monks\Entities\TeamStaff", mappedBy="staffs")
     */
    protected $teamStaffs;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    protected function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getShortBio()
    {
        return $this->shortBio;
    }

    /**
     * @param string $shortBio
     */
    public function setShortBio($shortBio)
    {
        $this->shortBio = $shortBio;
    }

    /**
     * @return mixed
     */
    public function getTeamStaffs()
    {
        return $this->teamStaffs;
    }
}
