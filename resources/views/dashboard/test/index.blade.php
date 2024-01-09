
@extends('layout.master')

@section('content')

@include("fragment.subwiew")


{{$name}}

@foreach ($posts as $item)
    <p>{{$item}}</p>
@endforeach
@endsection
