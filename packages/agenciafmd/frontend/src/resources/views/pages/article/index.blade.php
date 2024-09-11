@extends('agenciafmd/frontend::master', [
    'bodyClass' => 'bg-black mt-5',
    'critical' => '',
])

@section('title', 'Artigos')
@section('description', 'conheça nossos artigos')

@section('content')
    <div class="container">
        <div class="row">
            @if($article)
                @foreach($article as $articles)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="">
                                {{ $articles->picture('image', '', '') }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $articles->name }}
                                </h5>
                                <p class="card-text">
                                    {!! $articles->description !!}
                                </p>
                                <a href="{{ $articles->url }}" class="btn btn-primary">
                                    Ler mais
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
