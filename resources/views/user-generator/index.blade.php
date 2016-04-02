@extends('layouts.master')


@section('title')
   User-Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')
	<h1>User-Generator</h1>
	<form method='POST' action='/user-generator'>
		
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
	
		<p>How many users do you want?</p>
		Users: <input type='text' name='users'> (Max: 99)
		<br><br>
		
		include
		<br>
		<input name="birthdate" type="checkbox"> <label for="birthdate">Birthdate</label>		<br>
		
		<input name="profile" type="checkbox"> <label for="profile">Profile</label>		<br>
		
		@if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		<input type='submit' value='Generate'>  
    </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop