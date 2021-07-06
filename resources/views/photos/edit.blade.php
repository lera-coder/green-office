@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Редактировать фото</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($photo, ['route' => ['photos.update', $photo->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    <div class=" upload d-flex justify-content-center ">

                        <div class="form-group d-flex justify-content-center align-items-center">
                            {!! Form::label('name', 'Имя:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}


                        </div>

                        </div>

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

<style>
    .file-input input{
        margin: 40px auto;
    }
</style>
