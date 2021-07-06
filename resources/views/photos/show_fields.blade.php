<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Имя фото:') !!}
    <p>{{ $photo->name }}</p>
</div>

<!-- Photo Url Field -->
<div class="col-sm-12">
    {!! Form::label('photo_url', 'Фото') !!}
    <p><img width = '600px' src="{{ $photo->photo_url }}"></p>
</div>

