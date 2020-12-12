<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items = [];   // data of item such as image , des , title , price
    public $totalQuantity;
    public $totalPrice;

    // call automatically when create object from class (Cart)
    public function __construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalQuantity = $cart->totalQuantity;
            $this->totalPrice = $cart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product)
    {
        $item = [
            'title' => $product->title,
            'price' => $product->price,
            'quantity' => 0,
            'image' => $product->image,
        ];

        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;
            $this->totalQuantity += 1;
            $this->totalPrice += $product->price;
        } else {
            $this->totalQuantity += 1;
            $this->totalPrice += $product->price;
        }
        $this->items[$product->id]['quantity'] += 1;

    }
}
