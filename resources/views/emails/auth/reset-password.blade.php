@component('mail::message')
# Introduction

your code is: {{ $token }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
