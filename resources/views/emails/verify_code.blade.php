@component('mail::message')
# Xin chào **{{ $user->full_name }}**,

**{{ $user->full_name }}** đã gửi yêu cầu tới hệ thống đổi mật khẩu cho tài khoản của **{{ $user->full_name}}**.

Mã xác nhận để tiếp tục quá trình đổi mật khẩu là:

## 🔐 {{ $code }}

Vui lòng **không chia sẻ mã này với bất kỳ ai**. Mã này chỉ có hiệu lực trong vài phút.

Nếu **{{ $user->full_name }}** không yêu cầu đổi mật khẩu, bạn có thể bỏ qua email này.

Thanks,<br>
**Dev Store**
@endcomponent