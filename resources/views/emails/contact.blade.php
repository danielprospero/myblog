@component('mail::message')
# Mensagem do Visitante

Um visitante deixou uma mensagem
<br>
<br>
Nome: {{ $firstname }} {{ $lastname }}<br>
Email: {{ $email }}<br>
Titulo: {{ $subject }}<br>
Mensagem: {{ $message }}


@component('mail::button', ['url' => ''])
Ver mensagem
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
