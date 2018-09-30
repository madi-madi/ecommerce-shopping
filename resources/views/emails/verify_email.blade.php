@component('mail::message')
# Introduction

The body of your message.
{{-- route('verification',["email"=>$user->email,"verifyToken"=>$user->verify_token]) --}}
@component('mail::button', ['url' => route('verification',["email"=>$user->email,"verifyToken"=>$user->verify_token])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
