@extends('layouts.app')

@section('content')
<div class='flex justify-center mt-3'>
	<div class="w-8/12 bg-white p-6 rounded-lg">
		<form action="{{  route('posts') }}" method="POST">
			@csrf
			<div class="mb-2">
				<lable class="sr-only">Body</lable>	
				<textarea name="body" id="body" col="30" rows="4" class="bg-gray-100 border-2 w-full rounded-lg  p-4 @error('body')	border-red-400 	@enderror" placeholder="Post Here!"></textarea>

				@error('body')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}	
				</div>
				@enderror
			</div>

			<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium"> Submit </button>
		</form>
		<div class="my-4">
			
			@if ($posts->count())
				@foreach ($posts as $post) 
					<div class="mb-2">
						<a href="" class="font-bold">{{$post->user->name}}</a> <span class="text-gray-500 text-sm">{{$post->created_at->diffForHumans()}}</span>
						<p class="mb-2">{{$post->body}}</p>
					</div>
					
					@if ($post->ownedBy(auth()->user()))
						<div>
							<form action="{{ route('posts.destroy', $post)}}" method="POST" class="mr-1">
								@csrf
								@method('DELETE')
								<button type="submit" class="text-blue-500">Delete</button>
							</form>
						</div>
					@endif

					<div class="flex items-center mb-4">
						@auth
							@if (!$post->likedBy(auth()->user()))

								<form action="{{ route('posts.likes', $post)}}" method="POST" class="mr-1">
									@csrf
									<button type="submit" class="text-blue-500">Like</button>
								</form>
							
							@else 
					
								<form action="{{ route('posts.likes', $post)}}" method="POST" class="mr-1">
									@csrf
									@method('DELETE')
									<button type="submit" class="text-blue-500">Unlike</button>
								</form>

							@endif
						@endauth
						<span>{{$post->like()->count()}} {{Str::plural('like', $post->like()->count())}}</span>
					</div>
			 
				@endforeach
				
				{{ $posts->links() }}
			@else
				<p>No POST Here</p>
			@endif
		</div>
	</div>
	

</div>	
@endsection
