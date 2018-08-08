<?php

namespace Visa\CandidatBundle\Entity;

use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\MaxLength;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="candidat")
 * @ORM\Entity(repositoryClass="Visa\CandidatBundle\Repository\CandidatRepository")
 */
class Candidat
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @Assert\IsNull()
     */
    private $cin;

        /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * 
     *  * * *
     * @Assert\NotBlank(message="entrer votre nom.", groups={"Registration", "Profile"})
     * @Assert\IsNull() 
     *  message="The value {{ value }} is not a valid {{ type }}."
     * @Assert\Length(
     *     min=3,
     *     max=30,
     *     minMessage="Le nom est trop court.",
                           
     *     maxMessage="le nom est trop  long.",
     *     
     * )
     */
    private $nom;

    /**
     * @var string
   
     * @ORM\Column(name="email", type="string", length=255)
     * 
     * @Assert\NotBlank(message="entrer votre mail.", groups={"Registration", "Profile"})
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="situationfamiliale", type="string", length=255)
     * 
     * *  * * *
     * @Assert\NotBlank(message="entrer votre situationfamiliale.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=30,
     *     minMessage="Le titre est trop court.",
                           
     *     maxMessage="le titre est trop  long.",
     *     
     * )
     */
    private $situationfamiliale;

    /**
     * @var int
     *
     * @ORM\Column(name="nbjours", type="integer")
     */
    private $nbjours;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Candidat
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Candidat
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set situationfamiliale
     *
     * @param string $situationfamiliale
     *
     * @return Candidat
     */
    public function setSituationfamiliale($situationfamiliale)
    {
        $this->situationfamiliale = $situationfamiliale;

        return $this;
    }

    /**
     * Get situationfamiliale
     *
     * @return string
     */
    public function getSituationfamiliale()
    {
        return $this->situationfamiliale;
    }

    /**
     * Set nbjours
     *
     * @param integer $nbjours
     *
     * @return Candidat
     */
    public function setNbjours($nbjours)
    {
        $this->nbjours = $nbjours;

        return $this;
    }

    /**
     * Get nbjours
     *
     * @return int
     */
    public function getNbjours()
    {
        return $this->nbjours;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Candidat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return Candidat
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }
}
