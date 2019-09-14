@component('mail::message')
# Introduction

The body of your message.
{{$msg}}
@component('mail::button', ['url' => url('seotask/public/verify/'.$msg)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
