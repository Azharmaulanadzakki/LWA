@component('mail::message')

<h1>Hello, {{ $user->email }}</h1>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset your password
@endcomponent

<p>jika Anda mengalami masalah dalam memulihkan password Anda, silakan hubungi kami.</p>


<p style="color: red">Jika bukan anda, tolong abaikan pesan ini!</p>
Terima Kasih <br>
{{ config('app.name') }}

@endcomponent
