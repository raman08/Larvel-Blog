@extends('layouts.app')

@section('content')
<div class='flex justify-center mt-3'>
	<div class="w-4/12 bg-white p-6 rounded-lg">
		<form action="{{ route('register') }}" method="POST">
			@csrf

			<div class='mb-4'>
				<lable for='name' class='sr-only'>Name </lable>
				<input type='text' name='name' id='name' placeholder='Enter Your Name' class='bg-gray-100 border-2 w-full p-4 rounded-lg @error("name") border-red-500 @enderror' value='{{ old("name") }}'>

				@error('name')
					<div class="text-red-500 mt-2 text-sm"> 
						{{ $message }}
					</div>
				@enderror
			</div>	

			<div class='mb-4'>
				<lable for='username' class='sr-only'>UserName</lable>
				<input type='text' name='username' id='username' placeholder='Enter UserName' class='bg-gray-100 border-2 w-full p-4 rounded-lg @error("name") border-red-500 @enderror' value='{{ old("username") }}'>

				@error('username')
					<div class="text-red-500 mt-2 text-sm"> 
						{{ $message }}
					</div>
				@enderror
			</div>	
			
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

			<div class='mb-4'>
				<lable for='password_confirmation' class='sr-only'>Password Again </lable>
				<input type='password' name='password_confirmation' id='password_confirmation' placeholder='Enter Password Again' class='bg-gray-100 border-2 w-full p-4 rounded-lg' value=''>

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
