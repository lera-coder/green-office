@extends('layouts.app')

@section('content')
    <section class="content-header show">
        <div class="container-fluid">
            <div class="row mb-2">

                    <h1>Подробная информация</h1>
                    <a class="btn btn-default button-create button-back"
                       href="{{ route('pools.index') }}">
                        Назад
                    </a>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('pools.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection

<style>
    .content{
        margin: 0px 50px;
    }

    .row{
        position: relative;
    }

    a.btn.button-back.button-create{
        position: absolute;
        left: 85%;
        top: 20%;
        width: 100px;
    }
</style>
