@extends('layouts.app')

@section('content')

    <article class="margin-self">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                    <h1>Клиенты</h1>

                    <a class="btn btn-primary button-create"
                       href="{{ route('clients.create') }}">
                        Добавить нового
                    </a>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('clients.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $clients])
                    </div>
                </div>
            </div>

        </div>
    </div>
    </article>



@endsection


{{--<script>--}}


{{--    fetch(url).then(function(response) {--}}
{{--        response.text().then(function(text) {--}}
{{--            poemDisplay.textContent = text;--}}
{{--        });--}}
{{--    });--}}

{{--</script>--}}
