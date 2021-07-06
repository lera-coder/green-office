<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Имя:') !!}
    <p>{{ $client->name }}</p>
</div>

<!-- Telephone Number Field -->
<div class="col-sm-12">
    {!! Form::label('telephone_number', 'Номер телефона:') !!}
    <p>{{ $client->telephone_number }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Статус:') !!}
    @foreach($statuses as $status)

        @if($status->id==$client->status)
            <p>{{ $status->name }}</p>
        @endif
    @endforeach
</div>

<!-- Notes Field -->
<div class="col-sm-12">
    {!! Form::label('notes', 'Примечания:') !!}
    <p><br>{{ $client->notes }}</p>
</div>

<!-- Answer Field -->
<div class="col-sm-12">
    {!! Form::label('answer', 'Комментарий:') !!}
    <p><br>{{ $client->answer }}</p>
</div>





<style>
    .col-sm-12{
        margin-top: 20px;
    }

    p{

        display: inline !important;
    }
</style>

