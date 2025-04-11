@component('mail::message')
# Xin chào {{ $order->name }},

🎉 Chúc mừng! Đơn hàng **{{ $order->order_code }}** của bạn đã được **giao thành công**.

---

## 📦 Thông tin đơn hàng:
- **Mã đơn hàng:** {{ $order->order_code }}
- **Họ tên:** {{ $order->name }}
- **Giới tính:** {{ $order->gender }}
- **Email:** {{ $order->email }}
- **Địa chỉ giao hàng:** {{ $order->address }}
- **Số điện thoại:** {{ $order->phone_number }}
- **Hình thức thanh toán:** {{ $order->payment_method }}
- **Số lượng sản phẩm:** {{ $order->product_quantity }}
- **Tổng tiền:** {{ number_format($order->total_price, 0, ',', '.') }}đ
- **Thời gian đặt:** {{ \Carbon\Carbon::parse($order->order_date)->format('H:i d/m/Y') }}

---

✅ Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.  
Hy vọng bạn hài lòng với sản phẩm và dịch vụ.

Nếu cần hỗ trợ, đừng ngần ngại liên hệ với chúng tôi qua email hoặc số điện thoại.

Thanks,<br>
**Đội ngũ hỗ trợ khách hàng**
@endcomponent