<x-guest-layout title="Daftar">
	<div class="flex items-center justify-center w-full h-screen">
		<form method="POST" action="{{ route('register') }}" class="w-fit h-fit p-8 bg-gray-50 shadow-lg space-y-8 rounded-lg">
			@csrf
			<h1 class="text-2xl text-center font-semibold">Daftar</h1>

			<div class="space-y-4">
				<div>
					<div class="relative">
						<input type="text" name="username" placeholder="Username" class="py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-md px-10 bg-gray-100 invalid:focus:ring-red-500" value="{{ old('name') }}">
						<span class="absolute top-1/2 -translate-y-1/2 left-3 flex items-center text-lg text-gray-600"><i class="bx bx-user"></i></span>
					</div>
					@error('username')
						<x-message-valid>{{ $message }}</x-message-valid>
					@enderror
				</div>

				<div>
					<div class="relative">
						<input type="text" name="name" placeholder="Nama Lengkap" class="py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-md px-10 bg-gray-100 invalid:focus:ring-red-500" value="{{ old('name') }}">
						<span class="absolute top-1/2 -translate-y-1/2 left-3 flex items-center text-lg text-gray-600"><i class="bx bx-user"></i></span>
					</div>
					@error('name')
						<x-message-valid>{{ $message }}</x-message-valid>
					@enderror
				</div>

				<div>
					<div class="relative">
						<input type="email" name="email" autocomplete="email" placeholder="Email" class="py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-md px-10 bg-gray-100 invalid:focus:ring-red-500" value="{{ old('email') }}">
						<span class="absolute top-1/2 -translate-y-1/2 left-3 flex items-center text-lg text-gray-600"><i class="bx bx-envelope"></i></span>
					</div>
					@error('email')
						<x-message-valid>{{ $message }}</x-message-valid>
					@enderror
				</div>

				<div>
					<div class="show-password relative">
						<input type="password" name="password" placeholder="Password" class="password-input py-2 focus:outline-2 focus:outline-gray-400 rounded-md px-10 bg-gray-100">
						<span class="absolute top-1/2 -translate-y-1/2 left-3 flex items-center text-lg text-gray-600"><i class="bx bx-lock"></i></span>
						<button type="button" class="cursor-pointer w-fit h-fit flex absolute top-1/2 -translate-y-1/2 right-3 text-lg text-gray-600"><i class="bx bx-eye password-btn-icon"></i></button>
					</div>
					@error('password')
						<x-message-valid>{{ $message }}</x-message-valid>
					@enderror
				</div>

				<div>
					<div class="show-password relative">
						<input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="password-input py-2 focus:outline-2 focus:outline-gray-400 rounded-md px-10 bg-gray-100">
						<span class="absolute top-1/2 -translate-y-1/2 left-3 flex items-center text-lg text-gray-600"><i class="bx bx-lock"></i></span>
						<button type="button" class="cursor-pointer w-fit h-fit flex absolute top-1/2 -translate-y-1/2 right-3 text-lg text-gray-600"><i class="bx bx-eye password-btn-icon"></i></button>
					</div>
					@error('password')
						<x-message-valid>{{ $message }}</x-message-valid>
					@enderror
				</div>

				<button type="submit" class="w-full h-fit py-2 text-gray-50 bg-gray-950 rounded-md text-center cursor-pointer">Daftar</button>
			</div>

			<p class="text-sm text-gray-600 text-center">Sudah punya akun? <a href="{{ route('login') }}">Masuk!</a></p>
		</form>
	</div>
</x-guest-layout>