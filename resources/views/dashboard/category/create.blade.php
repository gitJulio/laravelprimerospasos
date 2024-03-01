@extends('Dashboard.layout')


@section('content')

    <h1>Crear Category</h1>


    @include('dashboard.fragment._errors-form')


    <form action="{{route('category.store')}}" method="POST">
            @include('dashboard.category._form')
    </form>
@endsection
