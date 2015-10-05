<?php

namespace Monks\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity Class Invitation.
 *
 * @ORM\Entity
 * @ORM\Table(
 *   name="invitations"
 * )
 */
class Invitation
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
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $targetEmail;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $used = false;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getTargetEmail()
    {
        return $this->targetEmail;
    }

    public function setTargetEmail($targetEmail)
    {
        $this->targetEmail = $targetEmail;

        return $this;
    }

    public function getUsed()
    {
        return $this->used;
    }

    public function setUsed($used)
    {
        $this->used = (bool) $used;

        return $this;
    }

    public function isUsed()
    {
        return $this->used;
    }

    public function markUsed()
    {
        $this->used = true;

        return $this;
    }
}
