@extends('layouts.app')

@section('content')
<div class='flex justify-center mt-3'>
	<div class="w-4/12 bg-white p-6 rounded-lg">
		@if(session("status"))
			<div class="bg-red-500 rounded-lg mb-6 text-white text-center p-6">
				{{ session("status") }}	
			</div>
		@endif

		<form action="{{ route('login') }}" method="POST">
			@csrf
			
			<div class='mb-4'>
				<lable for='email' class='sr-only'>Email</lable>
				<input type='email' name='email' id='email' placeholder='Enter Email' class='bg-gray-100 border-2 w-full p-4 rounded-lg @error("email") border-red-500 @enderror' value='{{ old("email") }}'>

				@error('email')
					<div class="text-red-500 mt-2 text-sm"> 
						{{ $message }}
					</div>
				@enderror
			</div>	

			<div class='mb-4'>
				<lable for='password' class='sr-only'>Password</lable>
				<input type='password' name='password' id='password' placeholder='Enter Password' class='bg-gray-100 border-2 w-full p-4 rounded-lg @error("password") border-red-500 @enderror' value=''>

				@error('password')
					<div class="text-red-500 mt-2 text-sm"> 
						{{ $message }}
					</div>
				@enderror
			</div>	

			<div class="mb-4">
				<div class="flex items-center">
					<input type="checkbox" name="remember" id="remember" class="mr-2">
					<lable for="remember">
						Remember Me
					</lable>
				</div>
			</div>

			<div>
				<button type='submit' class='bg-blue-500 text-white px-4 py-3 rounded-lg w-full font-medium'>
					Submit	
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
