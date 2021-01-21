@extends('layout')
@section('style')
<link href="/css/form.css" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
        <h2>New Article</h2>
        <div class="container1">
            <form  method="POST" action="/articles" enctype="multipart/form-data">
                @csrf
              <label for="title">Title</label>
              <input type="text" id="title" name="title" value=" {{old('title')}} ">
              @if ($errors->has('title'))
              <p style="color:red;"> {{$errors->first('title')}} </p>
              @endif
              <label for="excerpt">Excerpt</label>
              <input type="text" id="excerpt" name="excerpt">
              @if ($errors->has('excerpt'))
              <p style="color:red;"> {{$errors->first('excertp')}} </p>
              @endif
              <label for="image">Choose an Image </label> <br><br>
              <input type="file" id="image" name="image">
              <br><br><br>
              <button type="submit" name="action" value="submit">Submit</button>
              <button style="background-color: orange" type="submit" name="action" value="save">Submit for scheduled autopost</button>
            </form>
          </div>
    </div>
</div>

@endsection

