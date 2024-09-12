@extends('agenciafmd/frontend::master', [
    'bodyClass' => 'bg-black mt-5',
    'critical' => '',
])

@section('title', 'Artigos')
@section('description', 'conheça nossos artigos')

@section('content')
    <div class="container">
        <div class="row gy-2">
            @if($article)
                @foreach($article as $articles)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="">
                                {{ $articles->picture('image', 'img-fluid', '-ratio -ratio-16x9 w-100') }}
                            </div>
                            <div class="card-body d-flex flex-column h-100">
                                <h5 class="card-title">
                                    {{ $articles->name }}
                                </h5>
                                <div class="card-text flex-grow-1 h-100" style="flex-grow: 1 !important;">
                                    {!! Str::of($articles->description)->limit(180) !!}
                                </div>
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
