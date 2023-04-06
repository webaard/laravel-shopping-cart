<?php

namespace Webaard\LaravelShoppingCart\Entities;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CartObject
{
    /**
     * @param  Collection<string, CartItem>  $cartItems
     */
    public function __construct(
        public Collection $cartItems = new Collection(),
        public float $priceExcl = 0,
        public ?float $priceIncl = null,
        public ?float $vat = null,
        protected string $id = '',
    ) {
        $this->id = Str::uuid()->toString();
        $this->cartItems = new Collection();
    }

    /**
     * Get the total price of the cart without vat.
     */
    public function getTotalPriceExcl(): float
    {
        $this->priceExcl = $this->cartItems->sum(function ($_item) {
            return $_item->getTotalPriceExcl();
        });

        return $this->priceExcl;
    }

    /**
     * Get the total price of the cart with vat.
     */
    public function getTotalPriceIncl(): float
    {
        $this->priceIncl = $this->cartItems->sum(function ($_item) {
            return $_item->getTotalPriceIncl();
        });

        return $this->priceIncl ?? 0.0;
    }

    /**
     * Remove a cart item based on the id of the cart object.
     */
    public function removeCartItem(string $id): void
    {
        $this->cartItems->forget($id);

        $this->update();
    }

    /**
     * Add a cart item to the cart.
     */
    public function addCartItem(CartItem $cartItem): void
    {
        $this->cartItems->put($cartItem->getId(), $cartItem);
    }

    /**
     * Get the vat of the cart.
     */
    public function getVat(): float
    {
        $this->vat = $this->priceIncl - $this->priceExcl;

        return $this->vat;
    }

    /**
     * Update the values of the cart object.
     */
    public function update(): void
    {
        $this->getTotalPriceExcl();
        $this->getTotalPriceIncl();
        $this->getVat();
    }
}
