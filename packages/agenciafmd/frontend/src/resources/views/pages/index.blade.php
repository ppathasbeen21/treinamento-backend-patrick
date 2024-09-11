@extends('agenciafmd/frontend::master', [
'bodyClass' => 'index bg-black',
'critical' => 'index.css',
])

@section('title', 'Bem-vindo(a)')
@section('description', 'em breve, seu site estará logo aqui.')

@push('head')
<style>

</style>
@endpush

@section('content')
<main class="mt-5">
    <div class="container">
        <div class="row">
            @if($article)
                @foreach($article as $articles)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="">
                                Img
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $articles->name }}
                                </h5>
                                <p class="card-text">
                                    Descrição
                                </p>
                                <a href="#" class="btn btn-primary">
                                    Ler mais
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</main>
@endsection
