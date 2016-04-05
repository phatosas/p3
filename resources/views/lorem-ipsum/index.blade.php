@extends('layouts.master')


@section('title')
   Lorem Ipsum Generator
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
	
	<h1>Lorem Ipsum Generator</h1>
	
	<form method='POST' action='/lorem-ipsum'>
		
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
	
		<p>How many paragraphs do you want?</p>
		Paragraphs: <input type='text' name='paragraphs'> (Max: 99)
		
		<br><br>
		
		@if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif	

		
		<input type='submit' value='Generate'>
		
		@if(isset($paragraph))
			<p><?php echo implode('<p>', $paragraph); ?> </p>
		@endif
	
	</form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop