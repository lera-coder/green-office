@extends('layouts.app')

@section('content')
    <article class="margin-self">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Фото</h1>
            <a class="btn btn-primary d-block button-create"
               href="{{ route('photos.create') }}">
                Добавить новое
            </a>


        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body photo-table-container p-0">
                @include('photos.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $photos])
                    </div>
                </div>
            </div>

        </div>
    </div>
    </article>

@endsection



