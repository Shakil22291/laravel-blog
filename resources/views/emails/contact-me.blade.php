@component('mail::message')
# Customer Contact

{{$body}}

@component('mail::button', ['url' => 'mailto:'.$email])
Mail him
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
