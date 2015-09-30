<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class FootballEvent.
 *
 * @ORM\Entity()
 * @ORM\Table(name="football_events")
 */
class FootballEvent
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
     * @ORM\Column(name="short_description", type="text", nullable=true)
     */
    protected $shortDescription;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", name="post_slug", unique=true)
     */
    protected $postSlug;

    /**
     * @var Taxonomy
     *
     * @ORM\ManyToOne(targetEntity="Monks\Entities\Taxonomy")
     * @ORM\JoinColumn(name="taxonomy_id", referencedColumnName="id", nullable=false)
     */
    protected $taxonomy;

    /**
     * @var FootballEvent
     *
     * @ORM\ManyToOne(targetEntity="Monks\Entities\FootballEvent")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected $parent;

    /**
     * @ORM\Column(type="date", name="event_start_date")
     */
    protected $eventStartDate;

    /**
     * @ORM\Column(type="date", name="event_end_date")
     */
    protected $eventEndDate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
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
    public function getPostSlug()
    {
        return $this->postSlug;
    }

    /**
     * @param string $postSlug
     */
    public function setPostSlug($postSlug)
    {
        $this->postSlug = $postSlug;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return FootballEvent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param FootballEvent $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * @param mixed $taxonomy
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    }

    /**
     * @return mixed
     */
    public function getEventEndDate()
    {
        return $this->eventEndDate;
    }

    /**
     * @param mixed $eventEndDate
     */
    public function setEventEndDate($eventEndDate)
    {
        $this->eventEndDate = $eventEndDate;
    }

    /**
     * @return mixed
     */
    public function getEventStartDate()
    {
        return $this->eventStartDate;
    }

    /**
     * @param mixed $eventStartDate
     */
    public function setEventStartDate($eventStartDate)
    {
        $this->eventStartDate = $eventStartDate;
    }
}
