<div class="table-responsive">
    <table class="table" id="portfolioPhotos-table">
        <thead>
            <tr>

                <th>Фото</th>
                <th>Имя фото</th>
                <th>Порядок</th>
                <th colspan="3">Действие</th>
            </tr>
        </thead>
        <tbody>


          @foreach($portfolioPhotos as $portfolioPhoto)
                  <tr>
                @foreach($photos as $photo)
                    @if ($photo->id == $portfolioPhoto->photo_id)

                        <td><img height = "150px" src="{{ $photo->photo_url }}"></td>
                        <td>{{ $photo->name }}</td>
                    @endif

                @endforeach

                <td>{{ $portfolioPhoto->order }}</td>



                <td width="120">
                    {!! Form::open(['route' => ['portfolioPhotos.destroy', $portfolioPhoto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('portfolioPhotos.show', [$portfolioPhoto->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('portfolioPhotos.edit', [$portfolioPhoto->id]) }}" class='btn btn-default btn-xs'>
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
