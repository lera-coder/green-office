@extends('layouts.app')

@section('content')
    <section class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">

                    <h1>Подробная информация</h1>

                    <a class="btn btn-default button-create"
                       href="{{ route('clients.index') }}">
                        Назад
                    </a>

            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('clients.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
