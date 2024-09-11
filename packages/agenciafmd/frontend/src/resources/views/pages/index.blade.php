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
        <a href="{{ route('frontend.article.index') }}" class="btn btn-secondary">
            blog
        </a>
    </div>
</main>
@endsection
