@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<!-- <img src="https://stickerapp.com/cdn-assets/images/stickers/786t.png" class="logo" alt="Laravel Logo"> -->
<img src="https://raw.githubusercontent.com/NoriKachiPD/store/main/public/images/2.jpg" class="logo" alt="Laravel Logo" style="width: auto; max-height: 100%;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
