<?php

namespace App;

use App\Interfaces\ReaderInterface;
use App\Models\Offer;
use App\Models\OfferCollection;
use App\Interfaces\OfferCollectionInterface;

class JsonReader implements ReaderInterface {

    /**
     * @inheritDoc
     */
    public function read(string $input): OfferCollectionInterface {
        $content = file_get_contents($input);
        $items = json_decode($content, true);

        $collection = new OfferCollection();

        foreach ($items as $item) {
            $offer = new Offer($item['offerId'], $item['productTitle'],
                $item['vendorId'], $item['price']);

            $collection->add($offer);
        }

        return $collection;
    }
}