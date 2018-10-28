@component('mail::message')
# Introduction
 Welcome {{ucfirst($data['data']->name)}} ...
The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click here To Reset Your Password !
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
