@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Редактировать бассейн</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($pool, ['route' => ['pools.update', $pool->id], 'method' => 'patch']) !!}

            <div class="card-body">
{{--                <div class="row">--}}
                    @include('pools.fields')
{{--                </div>--}}
            <div class="row">
                <div class="form-group col-sm-3">
                    {!! Form::label('category', 'Статус:') !!}
                    {!! Form::select('category', $categories, $pool->category); !!}


                    {{--    {!! Form::select('status', null, ['class' => 'form-control']) !!}--}}
                </div>
                </div>

                <div class="form-group row main-photo-div">
                    <div class="col">
                        <h4 class="mt-5 mb-5"><strong>Главная фотография</strong></h4>
                        <img id = 'portfolio-image' src="{{$main_image->photo_url}}" alt="{{$main_image->name}}">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="form-group col-sm">
                        {!! Form::label('main_image', 'Заменить фотографию:') !!}
                        <select class="main_image" name="main_image" onchange="getValue({{$photos}}, this.value);">
                            @foreach($photos as $photo)
                                @if($photo->id==$pool->main_image)
                                    <option selected  value="{{$photo->id}}"> {{$photo->name}}</option>
                                @else
                                    <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                </div>


                <h2 class = "margin">Слайдер</h2>
            <div class = "image-gallery row">


                <?php  $counter = 0; ?>

                @foreach($slider_photos as $slider_photo)

                    <?php $counter++; ?>

                    <div class ="col-sm-3">
                        @if(!is_null($slider_photo[0]))
                            <img id = "slider_image{{$counter}}" src="{{$slider_photo[0]}}" alt="">

                            <select class="main_image" name="slider_image{{$counter}}" onchange="getValue2({{$photos}}, this.value, 'slider_image{{$counter}}');">
                                @foreach($photos as $photo)
                                    @if($photo->photo_url==$slider_photo[0])
                                        <option selected  value="{{$photo->id}}"> {{$photo->name}}</option>
                                    @else
                                        <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        @else
                            <img id = "slider_image{{$counter}}" src="" alt="">

                            <select class="main_image" name="slider_image{{$counter}}" onchange="getValue2({{$photos}}, this.value, 'slider_image{{$counter}}');">
                                <option selected  value="null"> нет картинки</option>
                                @foreach($photos as $photo)

                                        <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                @endforeach

                            </select>
                        @endif


                    </div>

                @endforeach
            </div>


                <h2 class = "margin">Галерея</h2>
                <div class = "image-gallery row ">


                    <?php  $counter = 0; ?>

                    @foreach($gallery_photos as $gallery_photo)

                        <?php $counter++; ?>

                        <div class ="col-sm-3">
                            @if(!is_null($gallery_photo[0]))
                                <img id = "gallery_image{{$counter}}" src="{{$gallery_photo[0]}}" alt="">

                                <select class="main_image" name="gallery_image{{$counter}}" onchange="getValue2({{$photos}}, this.value, 'gallery_image{{$counter}}');">
                                    @foreach($photos as $photo)
                                        @if($photo->photo_url==$gallery_photo[0])
                                            <option selected  value="{{$photo->id}}"> {{$photo->name}}</option>
                                        @else
                                            <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            @else
                                <img id = "gallery_image{{$counter}}" src="" alt="">

                                <select class="main_image" name="gallery_image{{$counter}}" onchange="getValue2({{$photos}}, this.value, 'gallery_image{{$counter}}');">
                                    <option selected  value="null"> нет картинки</option>
                                    @foreach($photos as $photo)

                                            <option  value="{{$photo->id}}"> {{$photo->name}}</option>
                                    @endforeach

                                </select>
                            @endif

                        </div>
                    @endforeach


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
        console.log(photos);
        document.querySelector('#portfolio-image').src =  photos[value-1]['photo_url']
    }

    function getValue2(photos, value, $id) {
        console.log(photos);
        document.querySelector('#'+$id).src =  photos[value-1]['photo_url']
    }


    // function getValueGallery(e){

    //     // let children = e.parentNode.parentNode.childNodes
    //     let children = e.parentNode.childNodes;

    //     for (let i = 0; i < children.length; ++i) {
    //         children[i].style = "border-color:#ccc"
    //     }


    //     e.parentNode.style = "border-color:black"


    // }

</script>



