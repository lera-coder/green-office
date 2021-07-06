@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Добавить новое фото в портфолио</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'portfolioPhotos.store']) !!}

            <div class="card-body">

                    @include('portfolio_photos.fields')

                    <!-- Photo Id Field -->
                        <div class="form-group row main-photo-div">
                            <div class="col">
                                <img id='portfolio-image' src="{{$photos->first()->photo_url}}" alt="Картинка">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                {!! Form::label('photo_id', 'Выбрать фотографию:') !!}
                                <select id="photo_id" name="photo_id" onchange="getValue({{$photos}}, this.value);">
                                    @foreach($photos as $photo)
                                            <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('portfolioPhotos.index') }}" class="btn btn-default">Отменить</a>
            </div>

            {!! Form::close() !!}

        </div>

    <script>
        function getValue(photos, value) {
            document.querySelector('#portfolio-image').src =  photos[value-1]['photo_url']
        }
    </script>

    <style scoped>
        .main-photo-div{
            margin-top: 70px;
            margin-bottom: 30px;
        }

        .main-photo-div img{
            height: 200px;
        }

        .form-control {
            display: inline-block;
            margin: 0px 30px;
            width: 100px;
        }
    </style>
@endsection
