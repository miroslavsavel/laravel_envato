@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <!-- this condition is for case, when the array is empty -->
    @if(count($guitars) > 0)
        @foreach($guitars as $guitar)
            <div>
                <h3>
                    <!-- route method will create route for every /guitars path, in this example .show -->
                    <a href="{{route('guitars.show', ['guitar' => $guitar['id']])}}">{{$guitar['name']}}</a>
                </h3>
                <ul>
                    <li>
                        Mady by: {{$guitar['brand']}}
                    </li>
                </ul>
                </div>
        @endforeach
    @else
        <h2>There are no guitars to display</h2>
    @endif
    <div>
        User Input: {{$userInput}}
    </div>
</div>
@endsection