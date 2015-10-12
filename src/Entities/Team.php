<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team.
 *
 * @ORM\Entity
 * @ORM\Table(
 *   name="teams",
 *   indexes={@ORM\Index(name="MYIDX_TEAM_NAME", columns={"name"})}
 * )
 **/
class Team
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
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @ORM\ManyToMany(targetEntity="Monks\Entities\Player", inversedBy="teams")
     * @ORM\JoinTable(name="player_associations")
     */
    protected $players;

    /**
     *  @ORM\OneToMany(targetEntity="Monks\Entities\TeamStaff", mappedBy="teams")
     */
    protected $teamStaffs;

    /*
     * @ORM\Column(type="string", name="home_ground",nullable=true)
     */
    protected $homeGround;

    /*
     * @ORM\Column(type="string", name="training_ground", nullable=true)
     */
    protected $traningGround;

    /**
     *
     */
    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string homeGround
     */
    public function getHomeGround()
    {
        return $this->homeGround;
    }

    /**
     * @param string $homeGround
     */
    public function setHomeGround($homeGround)
    {
        $this->homeGround = $homeGround;
    }

    /**
     * @return string trainingGround
     */
    public function getTraningGround()
    {
        return $this->traningGround;
    }

    /**
     * @param string $traningGround
     */
    public function setTraningGround($traningGround)
    {
        $this->traningGround = $traningGround;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
