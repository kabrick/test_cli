<?php

namespace App\Models;

use App\Interfaces\OfferCollectionInterface;
use App\Interfaces\OfferInterface;
use Iterator;

class OfferCollection implements OfferCollectionInterface {
    private $items = [];

    public function __construct(array $data = null) {
        $this->items = $data ?? [];
    }

    public function add(OfferInterface $offer): void {
        array_push($this->items, $offer);
    }

    public function get(int $index): OfferInterface {
        return ($this->items[$index] ? $this->items[$index] : null);
    }

    public function getIterator(): Iterator {
        return new \ArrayIterator($this->items);
    }
}