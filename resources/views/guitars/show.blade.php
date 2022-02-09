@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <!-- this condition is for case, when the array is empty -->
    <div>
        <h3>
            {{$guitar['name']}}
        </h3>
        <ul>
            <li>
                Mady by: {{$guitar['brand']}}
            </li>
        </ul>
    </div>
</div>
@endsection