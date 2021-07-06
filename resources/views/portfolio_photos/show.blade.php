@extends('layouts.app')

@section('content')
    <section class="content-header show">
        <div class="container-fluid">
            <div class="row ">

                    <h1 class = "mb-5">Подробная информация</h1>

                    <a class="btn btn-default button-create"
                       href="{{ route('portfolioPhotos.index') }}">
                        Назад
                    </a>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('portfolio_photos.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection

<style>
    .show{
        margin-bottom: 50px;
    }
</style>
