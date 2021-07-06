
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Создать бассейн</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'pools.store']) !!}

            <div class="card-body">
                    @include('pools.fields')

                <div class="row">
                    <div class="form-group col-sm-3">
                        {!! Form::label('category', 'Статус:') !!}
                        {!! Form::select('category', $categories); !!}


                </div>
                </div>

                <div class="form-group row main-photo-div">
                    <div class="col">
                        <h4 class="mt-5 mb-5"><strong>Главная фотография</strong></h4>
                        <img id = 'portfolio-image' src="/" alt="Главная картинка">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="form-group col-sm">
                        {!! Form::label('main_image', 'Заменить фотографию:') !!}
                        <select class="main_image" name="main_image" onchange="getValue({{$photos}}, this.value);">
                            <option selected  value="null"> нет картинки</option>
                            @foreach($photos as $photo)

                                    <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <h2 class = "margin">Слайдер</h2>
            <div class = "image-gallery row">



                    <div class ="col-sm-3">

                            <img id = "slider_image1" src="/" alt="">

                            <select class="main_image" name="slider_image1" onchange="getValue2({{$photos}}, this.value, 'slider_image1');">
                                <option selected  value="null"> нет картинки</option>
                                @foreach($photos as $photo)

                                        <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class ="col-sm-3">

                        <img id = "slider_image2" src="/" alt="">

                        <select class="main_image" name="slider_image2" onchange="getValue2({{$photos}}, this.value, 'slider_image2');">
                            <option selected  value="null"> нет картинки</option>
                            @foreach($photos as $photo)

                                    <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class ="col-sm-3">

                    <img id = "slider_image3" src="/" alt="">

                    <select class="main_image" name="slider_image3" onchange="getValue2({{$photos}}, this.value, 'slider_image3');">
                        <option selected  value="null"> нет картинки</option>
                        @foreach($photos as $photo)

                                <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                        @endforeach
                    </select>
            </div>

            </div>


             <h2 class = "margin">Галерея</h2>
                <div class = "image-gallery row ">

                    <div class ="col-sm-3">

                        <img id = "gallery_image1" src="/" alt="">

                        <select class="main_image" name="gallery_image1" onchange="getValue2({{$photos}}, this.value, 'gallery_image1');">
                            <option selected  value="null"> нет картинки</option>

                            @foreach($photos as $photo)

                                    <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class ="col-sm-3">

                    <img id = "gallery_image2" src="/" alt="">

                    <select class="main_image" name="gallery_image2" onchange="getValue2({{$photos}}, this.value, 'gallery_image2');">
                        <option selected  value="null"> нет картинки</option>

                        @foreach($photos as $photo)

                                <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                        @endforeach
                    </select>
            </div>



            <div class ="col-sm-3">

                <img id = "gallery_image3" src="/" alt="">

                <select class="main_image" name="gallery_image3" onchange="getValue2({{$photos}}, this.value, 'gallery_image3');">

                    <option selected  value="null"> нет картинки</option>

                    @foreach($photos as $photo)

                            <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                    @endforeach
                </select>
        </div>



        <div class ="col-sm-3">

            <img id = "gallery_image4" src="/" alt="">

            <select class="main_image" name="gallery_image4" onchange="getValue2({{$photos}}, this.value, 'gallery_image4');">

                <option selected  value="null"> нет картинки</option>

                @foreach($photos as $photo)

                        <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                @endforeach
            </select>
    </div>



    <div class ="col-sm-3">

        <img id = "gallery_image5" src="/" alt="">

        <select class="main_image" name="gallery_image5" onchange="getValue2({{$photos}}, this.value, 'gallery_image5');">

            <option selected  value="null"> нет картинки</option>

            @foreach($photos as $photo)

                    <option  value="{{$photo->id}}"> {{$photo->name}}</option>
            @endforeach
        </select>
    </div>

                </div>

            </div>



            <div class="card-footer">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('pools.index') }}" class="btn btn-default">Отменить</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection


<style>

    input[type=checkbox], input[type=radio] {
        display: none;
    }


    .main-photo-div {
        margin-top: 70px;
        margin-bottom: 30px;
    }

    .main-photo-div p {
        display: block;
    }

    .main-photo-div img{
        height: 250px;
    }

    .photo-div {
        border: solid 2px #ccc;
        border-radius: 10px;
        cursor: pointer;
    }

    .photo-div img{
        width: 100%;
    }

    .gallery-block{
        margin-top: 50px;
    }


    .image-gallery img{
        display: block;
        width: 300px;

    }


    .image-gallery select{
        display: inline-block;
        width: 300px;
        margin-top: 10px;
        position: absolute;
        bottom: -30px;
        left: 0px;
    }

    .image-gallery{
        display: flex;
        justify-content: center;
        align-items: stretch;
        position: relative;
        flex-wrap: wrap;
        padding-bottom: 100px;


    }

    .image-gallery div{
        background: #e8dfde;
        width: 300px;
        margin: 20px;
        padding: 0px;
        margin-top: 40px;
    }

    .margin{
        display: inline-block;
        margin-top: 70px;
        margin-bottom: 30px;
    }

</style>



<script>

    function getValue(photos, value) {
        document.querySelector('#portfolio-image').src =  photos[value-1]['photo_url']
    }

    function getValue2(photos, value, $id) {
        document.querySelector('#'+$id).src =  photos[value-1]['photo_url']
    }




</script>



