<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Post.
 *
 * @ORM\Entity
 * @ORM\Table(
 *   name="posts",
 *   indexes={
 *     @ORM\Index(name="MYIDX_POST_BODY", columns={"post_body"}, flags={"fulltext"}),
 *     @ORM\Index(name="MYIDX_POST_TTL", columns={"title"})
 *   }
 * )
 */
class Post
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
    protected $title;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", name="slug", unique=true)
     */
    protected $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="text", name="post_body")
     */
    protected $postBody;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $tags;

    /*
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Monks\Entities\Author")
     */
    protected $author;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * @param string $postBody
     */
    public function setPostBody($postBody)
    {
        $this->postBody = $postBody;
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
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    }
}
