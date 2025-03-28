<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart = null)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        // Xác định giá sử dụng (ưu tiên promotion_price nếu có)
        $price = $item->promotion_price > 0 ? $item->promotion_price : $item->unit_price;
        
        $storedItem = [
            'qty' => 0, 
            'price' => $price, // Giá đơn vị
            'item' => $item,
            'totalPrice' => 0 // Tổng giá cho sản phẩm này
        ];

        if ($this->items && array_key_exists($id, $this->items)) {
            $storedItem = $this->items[$id];
        }

        $storedItem['qty']++;
        $storedItem['totalPrice'] = $price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        
        $this->totalQty++;
        $this->totalPrice += $price; // Cộng dồn giá đơn vị
    }

    public function reduceByOne($id)
    {
        if (!isset($this->items[$id])) {
            return;
        }

        $price = $this->items[$id]['price']; // Đã lưu giá đúng khi thêm vào

        $this->items[$id]['qty']--;
        $this->items[$id]['totalPrice'] -= $price;
        
        $this->totalQty--;
        $this->totalPrice -= $price;

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        if (!isset($this->items[$id])) {
            return;
        }

        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['totalPrice'];
        unset($this->items[$id]);
    }
}