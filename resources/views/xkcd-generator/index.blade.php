@extends('layouts.master')


@section('title')
   xkcd-generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')
	<a href='/'>&larr; Home</a>
	
	<h1>Xkcd Generator</h1>

	<form method='POST' action='/xkcd-generator'>
		
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
	
		<p>Enter Number of Words</p>
		Words: <input type='text' name='words'> (Max: 9)
		<br><br>
		
		include
		<br>
		<input name="number" type="checkbox"> <label for="number">Number</label><br>
		
		<input name="sym" type="checkbox"> <label for="sym">Symbol</label><br>
		
		@if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif
		
		<input type='submit' value='Generate'> 

    </form>
	
	@if(isset($password))
		<p> The password is: {{ $password }} </p>
	@endif
	
	<h2>The Comic that Inspired This Tool</h2>
    <img 
	src='http://imgs.xkcd.com/comics/password_strength.png'
    style='width:745px'	
	alt='xkcd comic'>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop