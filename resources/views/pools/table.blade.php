<div class="table-responsive">
    <table class="table" id="pools-table" align="center">
        <thead>
            <tr>
                <th>Картинка</th>
                <th>Название на украинском</th>
                <th>Название на русском</th>
                <th>Цена</th>
                <th>Длина</th>
                <th>Ширина</th>
                <th>Высота</th>

                <th colspan="3">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pools as $pool)
            <tr>
                @foreach($photos as $photo)
                    @if ($photo->id === $pool->main_image)
                        <td><img width = "100px" src="{{ $photo->photo_url }}"></td>
                    @endif

                @endforeach
                <td>{{ $pool->title_ukr }}</td>
            <td>{{ $pool->title_rus }}</td>
            <td>{{ $pool->price }}</td>
            <td>{{ $pool->length }}</td>
            <td>{{ $pool->width }}</td>
            <td>{{ $pool->height }}</td>


                <td width="120">
                    {!! Form::open(['route' => ['pools.destroy', $pool->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pools.show', [$pool->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pools.edit', [$pool->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены??')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style scoped>

    .table td{
        padding: 20px;
    }
    </style>
