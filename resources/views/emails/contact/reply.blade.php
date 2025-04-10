@component('mail::message')
# Phản hồi từ **Dev Store**!

**Tên:** <b>{{ $contact->name }}</b><br>
**Email:** {{ $contact->email }}<br>
**Chủ đề:** {{ $contact->subject }}<br>
**Nội dung:** {{ $contact->message }}<br>

---

### 💬 Phản hồi từ Admin:

<h3>{{ $reply }}</h3>

Thanks,<br>
**Dev Store**
@endcomponent