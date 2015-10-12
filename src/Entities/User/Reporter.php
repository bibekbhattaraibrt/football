<?php

namespace Monks\Entities\User;

use Monks\Entities\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;


class Reporter extends BaseUser
{
    const TYPE = 'reporter';

    /**
     * @var ArrayCollection
     *
     *
     */
    protected $posts;

    public function __construct()
    {
        $this->setType(self::TYPE);
        $this->posts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
