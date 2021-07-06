@extends('layouts.app')

@section('content')
    <article class="margin-self">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                    <h1 >Портфолио фото</h1>

                    <a class="btn btn-primary button-create"
                       href="{{ route('portfolioPhotos.create') }}">
                        Добавить новое
                    </a>
                </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('portfolio_photos.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $portfolioPhotos])
                    </div>
                </div>
            </div>

        </div>
    </div>
    </article>

@endsection

