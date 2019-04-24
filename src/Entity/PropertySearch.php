<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class PropertySearch
{
   

    private $maxPrice;

    private $MinSurface;

    private $options;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }
    public function getOptions(): ?ArrayCollection
    {
        return $this->options;

    }
     public function setOptions(ArrayCollection $options): ?ArrayCollection
    {
        $this->options = $options;
        
    }

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(int $maxPrice): self
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    public function getMinSurface(): ?int
    {
        return $this->MinSurface;
    }

    public function setMinSurface(int $MinSurface): self
    {
        $this->MinSurface = $MinSurface;

        return $this;
    }
}
