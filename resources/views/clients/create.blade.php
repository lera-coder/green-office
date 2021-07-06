@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Добавить клиента</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'clients.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('clients.fields')

                    <!-- Status Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('status', 'Статус:') !!}
                            {!! Form::select('status', $statuses, 1); !!}

                        </div>
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('clients.index') }}" class="btn btn-default">Отменить</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection


<style>
    .content{
        width: 90%;
        margin: 20px auto;
    }
</style>
