<div class="table-responsive">
    <table class="table" id="clients-table">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Номер телефона</th>
            <th>Комментарий</th>
            <th>Примечания</th>
            <th>Статус</th>
            <th colspan="3">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->telephone_number }}</td>
                <td>{{ $client->answer }}</td>
                <td>{{ $client->notes }}</td>

                @foreach($statuses as $status)
                    @if ($client->status == $status->id)
                        <td>{{ $status->name }}</td>
                    @endif

                @endforeach
                <td width="120">
                    {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clients.show', [$client->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clients.edit', [$client->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
