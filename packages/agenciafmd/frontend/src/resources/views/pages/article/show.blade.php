@extends('agenciafmd/frontend::master', [
    'bodyClass' => 'mt-5',
    'critical' => '',
])

@section('title', $article->name)
@section('description', Str::of($article->description)->limit(200))

@section('content')
    <main>
        <section class="container">
            <a href="{{ route('frontend.article.index') }}" class="btn btn-secondary">
                Blogs
            </a>
            <h1>
                {{ $article->name }}
            </h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        {!! $article->description !!}
                    </div>
                    <div class="col-md-6">
                        {{ $article->picture('image', '', '') }}
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
