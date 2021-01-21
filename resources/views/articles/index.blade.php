@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
        @foreach ($articles as $article)
        <div id="content">
			<div class="title">
            <h2>
                <a href="/articles/{{$article->id}}">

                   {{$article->title}} 

                </a>
            </h2>
			<p>
                <img src="{{ asset('uploads/' . $article->image) }}" alt="" class="image image-full" /> The post published at: {{$article->created_at->format('Y-m-d | H:m')}} </p> 
            </p>
			<p> 
                {{$article->excerpt}} 
            </p>
		</div>
	</div>
        @endforeach
</div>
@endsection