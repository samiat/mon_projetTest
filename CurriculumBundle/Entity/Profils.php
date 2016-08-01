<?php

namespace Curriculum\CurriculumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profils
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Curriculum\CurriculumBundle\Entity\ProfilsRepository")
 */
class Profils
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=255)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="competences", type="string", length=255)
     */
    private $competences;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set profil
     *
     * @param string $profil
     * @return Profils
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set competences
     *
     * @param string $competences
     * @return Profils
     */
    public function setCompetences($competences)
    {
        $this->competences = $competences;

        return $this;
    }

    /**
     * Get competences
     *
     * @return string 
     */
    public function getCompetences()
    {
        return $this->competences;
    }
}
