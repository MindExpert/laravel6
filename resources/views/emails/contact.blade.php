@component('mail::message')
# Introduction

The body of your message.
Lorem ipsum dolor sit amen

- List
- goes
- here

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
