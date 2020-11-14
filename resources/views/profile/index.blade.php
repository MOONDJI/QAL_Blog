<h1>{{$title}}</h1>

@forelse ($profiles as $profile)

    {{-- <h2><a href="{{route('profiles.show', $profile->id)}}">{{$profile->first_name}} {{$profile->last_name}}</a></h2> --}}
    <h2><a href="{{route('profiles.show', $profile->id)}}">{{$profile->getFullNameAttribute()}}</a></h2>

@empty

    <h2>No profile yet</h2>

@endforelse
