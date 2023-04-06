<?php

namespace Webaard\LaravelShoppingCart\Entities;

use Illuminate\Support\Str;

class CartItem
{
    public function __construct(
        public string $productId,
        public int $quantity,
        public string $name,
        public string $sku,
        public float $priceExcl,
        public int $vatPercentage,
        public ?string $vatId = null,
        public mixed $options = null,
        public ?string $description = null,
        protected ?float $priceIncl = null,
        protected ?float $priceExclTotal = null,
        protected ?float $priceInclTotal = null,
        protected ?float $vat = null,
        protected string $id = '',
    ) {
        $this->id = Str::uuid()->toString();
    }

    /**
     * Get the id of the cart item.
     * Based on this id everything will preform.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the total vat
     */
    public function getTotalVat(): float
    {
        $this->getTotalPriceExcl();

        $this->vat = ($this->getTotalPriceExcl() / 100) * $this->vatPercentage;

        return $this->vat ?? 0.0;
    }

    /**
     * Get the price of a single product including vat.
     */
    public function getPriceIncl(): float
    {
        $this->priceIncl = $this->priceExcl + (($this->priceExcl / 100) * $this->vatPercentage);

        return $this->priceIncl;
    }

    /**
     * Get the price of the quantity of the product include the vat.
     */
    public function getTotalPriceIncl(): float
    {
        $this->priceInclTotal = $this->getTotalPriceExcl() + $this->getTotalVat();

        return $this->priceInclTotal ?? 0.0;
    }

    /**
     * Get the price of the quantity of the product without vat.
     */
    public function getTotalPriceExcl(): float
    {
        $this->priceExclTotal = $this->priceExcl * $this->quantity;

        return $this->priceExclTotal ?? 0.0;
    }

    /**
     * Update the values of the cart item.
     */
    public function update(): void
    {
        $this->getTotalVat();
        $this->getPriceIncl();
        $this->getTotalPriceIncl();
    }
}
