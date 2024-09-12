@extends('agenciafmd/admix::partials.crud.form')

@section('form')
    {{ Form::bsOpen(['model' => optional($model), 'create' => route('admix.article.store'), 'update' => route('admix.article.update', ['article' => ($model->id) ?? 0])]) }}
    <div class="card-header bg-gray-lightest">
        <h3 class="card-title">
            @if(request()->is('*/create'))
                Criar
            @elseif(request()->is('*/edit'))
                Editar
            @endif
            {{ config('local-article.name') }}
        </h3>
        <div class="card-options">
            @include('agenciafmd/admix::partials.btn.save')
        </div>
    </div>
    <ul class="list-group list-group-flush">

        @if (optional($model)->id)
            {{ Form::bsText('Código', 'id', null, ['disabled']) }}
        @endif

        {{ Form::bsIsActive('Ativo', 'is_active', null, ['required']) }}

        {{-- Form::bsBoolean('Destaque', 'star', null, ['required']) --}}

        {{ Form::bsText('Nome', 'name', null, ['required']) }}

        {{ Form::bsWysiwyg('Descrição', 'description', null, ['required']) }}

        @foreach(config('upload-configs.article') as $field => $upload)
            @if($upload['multiple'])
                {{ Form::bsImages($upload['label'], $field, $model) }}
            @else
                {{ Form::bsImage($upload['label'], $field, $model) }}
            @endif
        @endforeach

        {{-- Form::bsText('Ordenação', 'sort') --}}

    </ul>
    <div class="card-footer bg-gray-lightest text-right">
        <div class="d-flex">
            @include('agenciafmd/admix::partials.btn.back')
            @include('agenciafmd/admix::partials.btn.save')
        </div>
    </div>
    {{ Form::close() }}
@endsection
