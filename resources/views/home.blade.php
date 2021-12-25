@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добро пожаловать {{Auth::user()->name}}</h1>
</div>
@endsection
