@extends('agenciafmd/frontend::master', [
    'bodyClass' => '',
    'critical' => '',
])

@section('title', '$article->name')
@section('description', 'Str::of($article->description)->limit(200)')

@section('content')
<h1>
    oi
    @dd($article->$article)
    {{ $article->name }}
</h1>
@endsection
