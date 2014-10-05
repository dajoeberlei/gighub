<?php

namespace Gighub\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @ORM\Entity
 */
class ShowDate
{
    const STATUS_FREE = "free";
    const STATUS_USED = "used";
    const STATUS_BLOCK = "blocked";
    const STATUS_REQUESTED = "requested";

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $day;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $status = self::STATUS_FREE;


    public function __construct()
    {
        $this->day = new \DateTime("now");
    }

    /**
     * @return \DateTime
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param \DateTime $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return \Int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \Int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \String
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \String $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}