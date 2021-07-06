@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Загрузить фото</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['method'=>'post','files' => true,'route' => 'photos.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('photos.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('photos.index') }}" class="btn btn-default">Отменить</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
