@component('mail::message')
# Cấp lại mật khẩu cho tài khoản {{ $email }}

Mật khẩu mới của bạn là: **{{ $newPassword }}**

Vui lòng đăng nhập và đổi lại mật khẩu để đảm bảo an toàn.

@component('mail::button', ['url' => route('getlogin')])
Đăng nhập ngay
@endcomponent

Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!  
**Dev Store**
@endcomponent