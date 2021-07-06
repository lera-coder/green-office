<!-- Order Field -->
<div class="form-group row">
    <div class="col">
    {!! Form::label('order', 'Порядок в портфолио:') !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
    </div>
</div>




<style scoped>

    .form-control{
        max-width: 50%;
    }
</style>
