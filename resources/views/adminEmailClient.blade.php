@component('mail::message')
# {{ $bank }}

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
