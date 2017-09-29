<?php

namespace CarnetAdresse\InsecteBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Insecte
 * @package CarnetAdresse\InsecteBundle\Entity
 */
/**
 * @ORM\Entity()
 */
class Insecte extends BaseUser
{
    /**
     * @ORM\GeneratedValue()
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */

    private $age;

    /**
     * @ORM\Column(type="string",length=255)
     */

    private $famille;

    /**
     * @ORM\Column(type="string",length=255)
     */

    private $race;

    /**
     * @ORM\Column(type="string",length=255)
     */

    private $nourriture;

    /**
     * @ORM\OneToMany(targetEntity="Insecte", mappedBy="insect")
     */
    protected $amis;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Insecte", inversedBy="amis")
     * @ORM\JoinColumn(name="insect_id", referencedColumnName="id")
     */
    private $insect;


    /**
     * Constructor.
     */
    public function __construct() {
        $this->amis = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getAmis()
    {
        return $this->amis;
    }

    /**
     * @param mixed $amis
     */
    public function setAmis($amis)
    {
        $this->amis = $amis;
    }

    /**
     * @param mixed $insect
     */
    public function setInsect($insect = null)
    {
        $this->insect = $insect;

        return $this;
    }

    /**
     * @param  Insecte $insecte
     * @return void
     */
    public function ajouterAmis(Insecte $insecte)
    {
        if (!$this->amis->contains($insecte)) {
            $this->amis->add($insecte);
            $insecte->ajouterAmis($this);
        }
    }

    /**
     * @param  Insecte $insecte
     * @return void
     */
    public function supprimerAmis(Insecte  $insecte)
    {
        if ($this->amis->contains($insecte)) {
            $this->amis->removeElement($insecte);
            $insecte->supprimerAmis($this);
        }
    }


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
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param mixed $famille
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
    }

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return mixed
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * @param mixed $nourriture
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;
    }





}