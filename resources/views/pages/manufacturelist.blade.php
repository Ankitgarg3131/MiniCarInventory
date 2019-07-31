@extends('layout.app')
@section('content')

<div class="text-right">
    <a href="{{route('add-modal')}}">Add Model</a>
</div>
<br>
<br>
<br>
<div id="app">
      <manufacture-list></manufacture-list>
</div>
@endsection