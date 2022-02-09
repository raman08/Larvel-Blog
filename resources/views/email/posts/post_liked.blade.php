@component('mail::message')
# Your Post was liked 

{{ $liker->username }} like your post

@component('mail::button', ['url' => router('posts', $post)])
	View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
