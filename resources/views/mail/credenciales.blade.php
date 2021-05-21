@component('mail::message')
# Saludos

Te has registrado en nuestra plataforma de noticias
<br> Te adjuntamos las credenciales con las que te registraste
<br> Correo electrónico: {{ $data['email'] }}
<br> Contraseña: {{ $data['password'] }}

¡Gracias!<br>
{{ config('app.name') }}
@endcomponent
