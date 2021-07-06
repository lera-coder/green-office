<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Telephone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone_number', 'Номер телефона:') !!}
    {!! Form::text('telephone_number', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('answer', 'Комментарий клиента:') !!}
    {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('notes', 'Примечания:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>




