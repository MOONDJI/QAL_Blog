<h1>{{$title}}</h1>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Full Name</th>
    </tr>
@forelse ($profiles as $profile)

<tr>
        <td>{{$profile->first_name}}</td>
        <td>{{$profile->last_name}}</td>
        <td>
            {{-- <a href="{{route('profiles.show', $profile->id)}}">{{$profile->getFullNameAttribute()}}</a> --}}
            {{-- акксесор автоматечески генерирует данное поле с метода --}}
            <a href="{{route('profiles.show', $profile->id)}}">{{$profile->full_name}}</a>
        </td>
    </tr>

@empty

    <h2>No profile yet</h2>

    @endforelse
</table>
