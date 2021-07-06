@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Изменить фото в портфолио</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($portfolioPhoto, ['route' => ['portfolioPhotos.update', $portfolioPhoto->id], 'method' => 'patch']) !!}

            <div class="card-body">
                    @include('portfolio_photos.fields')

                    <!-- Photo Id Field -->
                        <div class="form-group row main-photo-div">
                            <div class="col">
                                <img id = 'portfolio-image' src="{{$photos->firstWhere('id', $portfolioPhoto->photo_id )->photo_url}}" alt="Картинка">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                {!! Form::label('photo_id', 'Заменить фотографию:') !!}
                                <select id="photo_id" name="photo_id" onchange="getValue({{$photos}}, this.value);">
                                    @foreach($photos as $photo)
                                        @if($photo->id==$portfolioPhoto->photo_id)
                                         <option selected  value="{{$photo->id}}"> {{$photo->name}}</option>
                                        @else
                                            <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('portfolioPhotos.index') }}" class="btn btn-default">Отменить</a>


            </div>

           {!! Form::close() !!}

        </div>
    </div>



    <style>
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


    <script>
        function getValue(photos, value) {
            document.querySelector('#portfolio-image').src = photos[value-1]['photo_url']
        }



    </script>

@endsection
