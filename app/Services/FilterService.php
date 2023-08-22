<?php

namespace App\Services;

class FilterService {
    private $offer_collection;

    public function __construct($offer_collection) {
        $this->offer_collection = $offer_collection;
    }

    public function filterByPrice($start, $end) : int {
        $count = 0;

        foreach($this->offer_collection->getIterator() as $offer) {
            if(($start <= $offer->getPrice()) && ($end >= $offer->getPrice())) {
                ++$count;
            }
        }

        return $count;
    }

    public function filterByVendor($vendor_id) : int {
        $count = 0;

        foreach($this->offer_collection->getIterator() as $offer) {
            if($vendor_id == $offer->getVendorId()) {
                $count++;
            }
        }

        return $count;
    }
}