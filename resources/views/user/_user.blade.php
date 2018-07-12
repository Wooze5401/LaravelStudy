<li>
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
    <a href="{{ route('user.show', $user->id) }}" class="username">{{ $user->name }}</a>

    @can('destroy',$user)
        <form action="{{route('user.destroy',$user->id)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
        </form>
    @endcan

</li>