@component('mail::message')
# Email Sent from Blog.

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
