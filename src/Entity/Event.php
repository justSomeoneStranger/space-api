<?php

namespace App\Entity;
use App\Repository\EventRepository;


use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Reservation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



 


/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=EventRepository::class)
 *  @Vich\Uploadable
 * @ORM\Table(name="evenntt")
*/
 
  class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=reservation::class, mappedBy="event", orphanRemoval=true, cascade={"all"})
     */
    private $reservation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $starAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;


    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;
    


    /**
     * @ORM\ManyToMany(targetEntity=Table::class)
     */
    private $tablee;

    

  
    

    

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        
        $this->tablee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setEvent($this);
        }

        return $this;
    }

    public function removeReservation(reservation $reservation): self
    {
        if ($this->reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getEvent() === $this) {
                $reservation->setEvent(null);
            }
        }

        return $this;
    }

    public function getStarAt(): ?\DateTimeInterface
    {
        return $this->starAt;
    }

    public function setStarAt(\DateTimeInterface $starAt): self
    {
        $this->starAt = $starAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    
    public function __toString(){
        return $this->name;
    }

    /**
     * @return Collection|Table[]
     */
    public function getTablee(): Collection
    {
        return $this->tablee;
    }

    public function addTablee(Table $tablee): self
    {
        if (!$this->tablee->contains($tablee)) {
            $this->tablee[] = $tablee;
        }

        return $this;
    }

    public function removeTablee(Table $tablee): self
    {
        $this->tablee->removeElement($tablee);

        return $this;
    }



    public function setImageFile($image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }



    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    
}
