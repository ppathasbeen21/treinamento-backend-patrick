@extends('agenciafmd/frontend::master', [
    'bodyClass' => '',
    'critical' => '',
])

@section('title', $article->name)
@section('description', Str::of($article->description)->limit(200))

@section('content')
    <h1>
        {{ $article->name }}
    </h1>

    <div class="container">
        <div class="row">

        </div>
    </div>
@endsection
