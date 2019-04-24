<?php

namespace App\Entity;

class PropertySearch
{
   

    private $maxPrice;

    private $MinSurface;

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
