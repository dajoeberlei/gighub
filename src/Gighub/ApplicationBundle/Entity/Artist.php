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
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $artistType = self::ARTIST_BAND;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="artists")
     **/
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $profilePicture;

    public function getAbsolutePath()
    {
        return null === $this->profilePicture
            ? null
            : $this->getUploadRootDir().'/'.$this->profilePicture;
    }

    public function getWebPath()
    {
        return null === $this->profilePicture
            ? null
            : $this->getUploadDir().'/'.$this->profilePicture;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }




    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * @param User $user
     */
    public function addMember(User $user) {
        $user->addArtist($this);
        $this->members[] = $user;
    }

    /**
     * @param User $user
     */
    public function removeMember(User $user) {
        $user->removeArtist($this);
        $this->members->removeElement($user);
    }



}