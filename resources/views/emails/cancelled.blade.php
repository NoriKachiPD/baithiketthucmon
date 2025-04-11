@component('mail::message')
# Xin chào {{ $order->name }},

❌ Rất tiếc! Đơn hàng **{{ $order->order_code }}** của bạn đã bị **hủy**.

---

## 📦 Thông tin đơn hàng bị hủy:
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

Chúng tôi thành thật xin lỗi vì sự bất tiện này.  
Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi để được hỗ trợ nhanh nhất.

Thanks,<br>
**Đội ngũ hỗ trợ khách hàng**
@endcomponent