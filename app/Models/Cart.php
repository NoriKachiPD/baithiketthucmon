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

    public function add($item, $id, $quantity)
    {
        // Xác định giá sử dụng (ưu tiên promotion_price nếu có)
        $price = $item->promotion_price > 0 ? $item->promotion_price : $item->unit_price;
        
        // Kiểm tra xem sản phẩm đã có trong giỏ hay chưa
        if ($this->items && array_key_exists($id, $this->items)) {
            // Nếu có rồi, chỉ cần cộng thêm số lượng
            $storedItem = $this->items[$id];
            $storedItem['qty'] += $quantity; // Cộng số lượng
            $storedItem['totalPrice'] = $storedItem['qty'] * $price; // Cập nhật tổng giá
            
            $this->items[$id] = $storedItem; // Cập nhật giỏ hàng
        } else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
            $storedItem = [
                'qty' => $quantity, // Số lượng người dùng chọn
                'price' => $price, // Giá đơn vị
                'item' => $item,
                'totalPrice' => $price * $quantity // Tổng giá cho sản phẩm này
            ];
    
            $this->items[$id] = $storedItem; // Thêm sản phẩm vào giỏ
        }
        
        // Cập nhật tổng số lượng và tổng giá giỏ hàng
        $this->totalQty += $quantity;
        $this->totalPrice += $price * $quantity;
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