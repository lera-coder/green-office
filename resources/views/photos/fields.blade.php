{{--<!-- Name Field -->--}}
<div class=" upload d-flex justify-content-center ">

<div class="form-group d-flex justify-content-center align-items-center">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
{{--    <div class="divider"></div>--}}
    <div class = "file-input">{{Form::file('image')}}
    </div>

</div>



</div>

<style>
    .file-input input{
        margin: 40px auto;
    }
</style>
