@extends('dashboard.layout')

@section('content')


<a href="{{Route('category.create')}}">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>
                        <a href="{{Route('category.edit',$category)}}">Editar</a>
                        <a href="{{Route('category.show',$category)}}">Ver</a>
                        <form action="{{Route('category.destroy',$category)}}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$categories->links()}}

@endsection
