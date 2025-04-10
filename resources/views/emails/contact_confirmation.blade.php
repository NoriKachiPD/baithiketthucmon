@component('mail::message')
# Cảm ơn bạn đã liên hệ tới **Store**!

**Tên:** <b>{{ $contact->name }}</b><br>
**Email:** {{ $contact->email }}<br>
**Chủ đề:** {{ $contact->subject }}
**Nội dung:** {{ $contact->message }}<br>

---

Chúng tôi sẽ phản hồi bạn sớm nhất có thể.  
Cảm ơn bạn đã tin tưởng sử dụng dịch vụ của chúng tôi!

Thanks,<br>
**Dev Store**
@endcomponent
<!-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> -->