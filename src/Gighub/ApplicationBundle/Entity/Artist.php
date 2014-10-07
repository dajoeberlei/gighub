<?php

namespace Gighub\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @ORM\Entity
 */
class Artist
{
    const ARTIST_BAND = "band";
    const ARTIST_SOLO = "solo";


    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $artistType = self::ARTIST_BAND;

    /**
     * @ORM\Column(type="integer")
     */
    protected $members;

    /**
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $genre;




    public function __construct()
    {

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
     * @return mixed
     */
    public function getArtistType()
    {
        return $this->artistType;
    }

    /**
     * @param mixed $artistType
     */
    public function setArtistType($artistType)
    {
        $this->artistType = $artistType;
    }

    /**
     * @return mixed
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
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
    }




}