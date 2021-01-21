@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{$article->title}} </h2>
                <img src="{{ asset('uploads/' . $article->image) }}" alt="" class="image image-full" /> The post published at: {{$article->created_at->format('Y-m-d')}} </p> 
				<p>{{$article->excerpt}}</p>
		</div>
	</div>
  </div>
</div>

@endsection