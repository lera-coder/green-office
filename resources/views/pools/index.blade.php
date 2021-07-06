@extends('layouts.app')



@section('content')
    <article class="margin-self">
    <section class="content-header">
        <div class="container-fluid">
                    <h1 class = 'd-inline-block mb-5'>Бассейны</h1>

                    <a class="btn btn-primary button-create"
                    href="{{ route('pools.create') }}">
                     Добавить новый
                 </a>


        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('pools.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $pools])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

</article>



