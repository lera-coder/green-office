<!-- Order Field -->
<div class="col-sm-12">
    {!! Form::label('order', 'Порядок фотографии в портфолио:') !!}
    <p>{{ $portfolioPhoto->order }}</p>
</div>

<!-- Photo Id Field -->
<div class="col-sm-12">
    {!! Form::label('photo_id', 'Фото:') !!}

    @foreach($photos as $photo)

        @if ($photo->id === $portfolioPhoto->photo_id)
            <div class="col">
                <img class = 'main-photo' height="300px" src="{{ $photo->photo_url }}" alt="Pool">
            </div>

        @endif


    @endforeach
</div>

