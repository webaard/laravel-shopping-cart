<?php

namespace Webaard\LaravelShoppingCart;

use Illuminate\Support\Collection;
use Webaard\LaravelShoppingCart\Entities\CartObject;
use Webaard\LaravelShoppingCart\Entities\CartItem;

class Cart
{
    private CartObject $cartObject;

    public function __construct()
    {
        if (! session()->has('cart')) {
            session(['cart' => new CartObject()]);
        }

        $this->cartObject = session('cart');
    }

    public function __destruct()
    {
        session()->save();
    }

    /**
     * Add a CartItem object to the cart.
     */
    public function add(CartItem $cartItem): void
    {
        $this->cartObject->addCartItem($cartItem);

        $this->update();
    }

    /**
     * Get the cart.
     */
    public function get(): CartObject
    {
        return $this->cartObject;
    }

    /**
     * Get all the cart items of the card.
     *
     * @return Collection<string, CartItem>
     */
    public function getCartItems(): Collection
    {
        return $this->cartObject->cartItems;
    }

    /**
     * Remove a cart item of the cart.
     */
    public function remove(string $id): void
    {
        $this->cartObject->removeCartItem($id);
    }

    /**
     * Update the card with the newest values.
     */
    public function update(): void
    {
        $this->cartObject->cartItems->each(function ($_cartItem) {
            $_cartItem->update();
        });

        $this->cartObject->update();

        session(['cart' => $this->cartObject]);
    }

    /**
     * Destroy the cart.
     */
    public function destroy(): void
    {
        session()->forget('cart');
        session()->save();
    }
}
