<?php

namespace App\Models;

use App\Interfaces\OfferInterface;

class Offer implements OfferInterface {
    private int $id;
    private string $product_title;
    private int $vendor_id;
    private float $price;

    /**
     * @param int $id
     * @param string $product_title
     * @param int $vendor_id
     * @param float $price
     */
    public function __construct(int $id, string $product_title, int $vendor_id, float $price)
    {
        $this->id = $id;
        $this->product_title = $product_title;
        $this->vendor_id = $vendor_id;
        $this->price = $price;
    }


    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getProductTitle(): string {
        return $this->product_title;
    }

    public function setProductTitle(string $product_title): void {
        $this->product_title = $product_title;
    }

    public function getVendorId(): int {
        return $this->vendor_id;
    }

    public function setVendorId(int $vendor_id): void {
        $this->vendor_id = $vendor_id;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

}