<x-mail::message>
# Hello Summoner, you've got MAIL!
<h3> Name: {{$data['name']}}</h3>
<h3> E-mail: {{$data['email']}}</h3>
<h3> Subject: {{$data['sub']}}</h3>
<h3> Message: {{$data['message']}}</h3>


<x-mail::button :url="''">
view form</x-mail::button>

Yours,<br>
{{ config('app.name') }}
</x-mail::message>
