@extends('layout')
@section('style')
<link href="/css/form.css" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
        <h2>Change bot</h2>
        <div class="container1">
        <form  method="POST" action="/bot/{$id}" enctype="multipart/form-data">
      @csrf
      @method("PUT")
            <label for="channelName">Insert new channel Name</label>
            <input type="text" id="channelName" name="channelName" placeholder="Channel Name..">
            <label for="channelName">Insert new channel ID</label>
            <input type="text" id="channelID" name="channelID" placeholder="Channel ID..">
            <label for="botToken">Inser new bot Token</label>
            <input type="text" id="botToken" name="botToken" placeholder="Bot Token..">
            <br><br><br>
            <button type="submit" name="action" value="submit">Submit</button>
          </form>
        </div>
    </div>
</div>

@endsection