@extends('layout')
@section('style')
<link href="/css/form.css" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
        <h2>New Article</h2>
        <div class="container1">
            <form  method="POST" action="" enctype="multipart/form-data">
				@csrf
				@method("PUT")
              <label for="channel">Insert new channel ID</label>
              <input type="text" id="channel" name="channel" placeholder="Channel ID..">
              @if ($errors->has('title'))
              <p style="color:red;"> {{$errors->first('channel')}} </p>
              @endif
              <label for="bot">Inser new bot Token</label>
              <input type="text" id="bot" name="bot" placeholder="Bot Token..">
              @if ($errors->has('excerpt'))
              <p style="color:red;"> {{$errors->first('excertp')}} </p>
              @endif
              <br><br><br>
              <button type="submit" name="action" value="submit">Submit</button>
            </form>
          </div>
    </div>
</div>
{{-- @foreach ($bots as $bot)
			<p style="color: lightslategray">
			Channel name: {{$bot->channelName}} <br>
			Channel ID: {{$bot->channelID}} <br>
			Bot token: {{$bot->botToken}}
			</p> 
		@endforeach --}}

@endsection