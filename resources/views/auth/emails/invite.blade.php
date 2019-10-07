<p>
	Halo {{ $member->name }}
</p>
<p>
	Admin kami telah mendaftarkan email Anda ({{ $member->email }}) ke Larampus. Untuk login, silahkan kunjungi <a href="{{ $login=url('login') }}">{{ $login }}</a>. Login dengan email anda dan password <strong>{{ $password }}</strong>
</p>

<p>
	Jika anda ingin mengubah password, silahkan kunjungi <a href="{{ $reset=url('password/reset') }}">{{ $reset }}</a> dan masukan email Anda.
</p>