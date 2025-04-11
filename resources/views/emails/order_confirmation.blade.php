@component('mail::message')
# 👋 Chào {{ $order->name }},

Cảm ơn bạn đã đặt hàng tại **Dev Store**! Dưới đây là thông tin đơn hàng của bạn:

---

**🧾 Mã đơn hàng:** `{{ $order->order_code }}`  
**👤 Họ tên:** {{ $order->name }}  
**⚧ Giới tính:** {{ $order->gender }}  
**📧 Email:** {{ $order->email }}  
**🏠 Địa chỉ giao hàng:** {{ $order->address }}  
**📞 Số điện thoại:** {{ $order->phone_number }}  
**💳 Hình thức thanh toán:** {{ $order->payment_method }}  
**📦 Số lượng sản phẩm:** {{ $order->product_quantity }}  
**💰 Tổng tiền:** {{ number_format($order->total_price, 0, ',', '.') }}đ  
**🕓 Thời gian đặt:** {{ \Carbon\Carbon::parse($order->order_date)->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') }}

---

Chúng tôi sẽ xử lý đơn hàng và giao tới bạn trong thời gian sớm nhất.  
Nếu bạn có bất kỳ thắc mắc hoặc cần hỗ trợ, hãy liên hệ với chúng tôi ngay nhé!

Thanks,<br>
**Dev Store**
@endcomponent