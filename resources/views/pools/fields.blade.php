<!-- Title Ukr Field -->
<div class="row">
<div class="form-group col-sm-6">
    {!! Form::label('title_ukr', 'Полное название на украинском:') !!}
    {!! Form::text('title_ukr', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Title Rus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title_rus', 'Полное название на русском:') !!}
    {!! Form::text('title_rus', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

<!-- Card Title Ukr Field -->
<div class="row">
<div class="form-group col-sm-6">
    {!! Form::label('card_title_ukr', 'Название в каталоге на украинском:') !!}
    {!! Form::text('card_title_ukr', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Card Title Rus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_title_rus', 'Название в каталоге на русском:') !!}
    {!! Form::text('card_title_rus', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>


<div class="row">
<!-- Short Description Ukr Field -->
<div class="form-group col-sm">
    {!! Form::label('short_description_ukr', 'Краткое описание на украинском:') !!}
    {!! Form::textarea('short_description_ukr', null, ['class' => 'form-control']) !!}
</div>

<!-- Short Description Rus Field -->
<div class="form-group col-sm">
    {!! Form::label('short_description_rus', 'Краткое описание на русском:') !!}
    {!! Form::textarea('short_description_rus', null, ['class' => 'form-control']) !!}
</div>
</div>


<div class="row">
<!-- Description Ukr Field -->
<div class="form-group col-sm">
    {!! Form::label('description_ukr', 'Описание на украинском:') !!}
    {!! Form::textarea('description_ukr', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Rus Field -->
<div class="form-group col-sm">
    {!! Form::label('description_rus', 'Описание на русском:') !!}
    {!! Form::textarea('description_rus', null, ['class' => 'form-control']) !!}
</div>
</div>



<div class="row">

    <!-- Price Field -->

    <div class="form-group col-sm-3">
        {!! Form::label('price', 'Цена:') !!}
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
    </div>

<!-- Length Field -->
<div class="form-group col-sm-3">
    {!! Form::label('length', 'Длина:') !!}
    {!! Form::text('length', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Width Field -->

<div class="form-group col-sm-3">
    {!! Form::label('width', 'Ширина:') !!}
    {!! Form::text('width', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Height Field -->
<div class="form-group col-sm-3">
    {!! Form::label('height', 'Высота:') !!}
    {!! Form::text('height', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>
</div>

{{-- <div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('category', 'Категория:') !!}
        {!! Form::text('category', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
    </div>

</div> --}}

                    <!-- Status Field -->


<!-- Main Image Field -->



<style scoped>
    .row{
        margin: 20px;
    }
</style>




