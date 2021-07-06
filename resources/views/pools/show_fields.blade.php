
<h2>{{$pool->title_rus}}</h2>

{{--Возможность редактировать и удалить --}}

<div class = 'd-flex flex-row-reverse width-col'>
{!! Form::open(['route' => ['pools.destroy', $pool->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
     <a href="{{ route('pools.edit', [$pool->id]) }}" class='btn btn-default btn-xs'>
        <i class="far fa-edit"></i>
    </a>
    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены??')"]) !!}
</div>
{!! Form::close() !!}
</div>




{{--Названия модели--}}

<div class="row width-col">
    <div class="col-md-6">
        {!! Form::label('title_ukr', '  Полное название на украинском:') !!}
        <p>{{ $pool->title_ukr }}</p>
    </div>
    <div class="col-md-6">
        {!! Form::label('title_rus', 'Полное название на русском:') !!}
        <p>{{ $pool->title_rus }}</p>
    </div>
</div>

{{--Названия модели--}}

<div class="row width-col">
    <div class="col-md-6">
        {!! Form::label('card_title_ukr', '  Название в каталоге на украинском:') !!}
        <p>{{ $pool->card_title_ukr }}</p>
    </div>
    <div class="col-md-6">
        {!! Form::label('card_title_rus', 'Название в каталоге на русском:') !!}
        <p>{{ $pool->card_title_rus }}</p>
    </div>
</div>

{{--Картинки--}}

<div class=" image-container">

    <div class="row justify-content-center align-items-center">

                    <img class = 'main-photo' height="300px" src="{{ $main_photo->photo_url }}" alt="Pool">



    </div>

    <div class="row justify-content-center align-items-center d-flex mt-4 not-full-size">


            @foreach($gallery_photos as $gallery_photo)

                @if($gallery_photo[0]!=null)
                        <div class="col-md-3">
                            <img class='img-thumbnail '  src="{{ $gallery_photo[0] }}" alt="{{$gallery_photo[1]}}">
                        </div>
                @endif


            @endforeach
    </div>
</div>


{{--Описания модели--}}

<div class="row width-col">
    <div class="col-md-6">
        {!! Form::label('description_ukr', '  Описание бассейна на украинском:') !!}
        <p>{{ $pool->description_ukr }}</p>
    </div>
    <div class="col-md-6">
        {!! Form::label('description_rus', 'Описание бассейна на русском:') !!}
        <p>{{ $pool->description_rus }}</p>
    </div>
</div>

<div class="row width-col">
    <div class="col-md-6">
        {!! Form::label('short_description_ukr', 'Краткое описание бассейна на украинском:') !!}
        <p>{{ $pool->short_description_ukr }}</p>
    </div>
    <div class="col-md-6">
        {!! Form::label('short_description_rus', 'Краткое писание бассейна на русском:') !!}
        <p>{{ $pool->short_description_rus }}</p>
    </div>
</div>


<div class="row width-col row-padding">
<!-- Price Field -->
<div class="col-md-3">
    {!! Form::label('price', 'Цена:') !!}
    <p>{{ $pool->price }} грн.</p>
</div>



<!-- Length Field -->
    <div class="col-md-3">
    {!! Form::label('length', 'Длина:') !!}
    <p>{{ $pool->length }}</p>
    </div>

<!-- Width Field -->
    <div class="col-md-3">
    {!! Form::label('width', 'Ширина:') !!}
    <p>{{ $pool->width }}</p>
    </div>

<!-- Height Field -->
    <div class="col-md-3">
    {!! Form::label('height', 'Высота:') !!}
    <p>{{ $pool->height }}</p>
    </div>
</div>


{{--Слайдер--}}
<div class="row width-col">
    <div class="col">
        <h3>Слайдер</h3>
    </div>
</div>








            @foreach($slider_photos  as $slider_photo)
                              @if($slider_photo[0]!=null)

                                <img class="d-block slider-images" src="{{ $slider_photo[0] }}" alt="slide">
                              @endif

            @endforeach









<style>

    #carouselExampleIndicators{
        width: 90%;
        margin: 40px 10px;
    }

    #carouselExampleIndicators img{
        height: 500px;
    }

    h3{
        text-align: center;
        margin-top: 30px;
        font-size: 35px;
    }


    .main-photo{
        height: 300px;
        padding: 0px 20px;
    }
    .width-col, h2{
        text-align: center;
        margin: 8px 50px;
        width: 100%;
    }

    .slider-images{
        width: 300px;
        margin: 100px 10px;
    }


    .not-full-size{
        margin: 40px 50px;
        width: 90%;
        display: flex;
        justify-content: center;
    }

    .not-full-size img{
        width: 90%;
        border: none;
        box-shadow:none;

    }

    .container .row{
        padding: 10px;
    }

    .image-container{
        margin: 100px 0px;
    }

    .row-padding{
        padding: 30px 50px;
    }




</style>
