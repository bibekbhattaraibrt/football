<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(
 *   name="players",
 *   indexes={@ORM\Index(name="MYIDX_PLRS_NAME", columns={"name"})}
 * )
 */
class Player
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
     * @ORM\Column(type="text", name="short_bio")
     */
    protected $shortBio = '';

    /**
     * Uses a bridge table for M2M mapping: player_associations.
     *
     * @ORM\ManyToMany(targetEntity="Monks\Entities\Team", mappedBy="players")
     * @ORM\JoinTable(
     *   name="player_associations",
     *   joinColumns={@ORM\JoinColumn(name="player_id", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="team_id", referencedColumnName="id", unique=true)}
     * )
     */
    protected $teams;

    /**
     *
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Gets the value of shortBio.
     *
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
     * @return array
     */
    public function getTeams()
    {
        return $this->teams;
    }

    public function assignToTeam(Team $team)
    {
        $this->teams[] = $team;
    }

    public function removeFromTeam(Team $team)
    {
        $this->teams->removeElement($team);
    }
}
