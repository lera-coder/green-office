<div class="table-responsive">
    <table class="table" id="photos-table">
        <thead>
            <tr>
                <th align="center">Фото</th>
                <th>Имя</th>

                <th colspan="3">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            @if($photo->visibility==true)
            <tr>
                <td> <img width="250px" src="{{ $photo->photo_url }}"></td>
                <td>{{ $photo->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('photos.show', [$photo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('photos.edit', [$photo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>

                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
