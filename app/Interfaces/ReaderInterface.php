<?php

namespace App\Interfaces;

interface ReaderInterface {
    /**
     * Read in incoming data and parse to objects
     */
    public function read(string $input): OfferCollectionInterface;
}
