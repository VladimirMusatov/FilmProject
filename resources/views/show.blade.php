@extends('layouts.app')

@section('content')

<div class="container">
	@foreach($kino as $kino)
		Станица фильма:{{$kino->title}}
	@endforeach
</div>

@endsection