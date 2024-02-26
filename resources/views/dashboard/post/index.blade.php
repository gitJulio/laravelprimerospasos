@extends('dashboard.layout')

@section('content')


<a href="{{Route('post.create')}}">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Posted</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->title}}</td>
                    <td>{{$post->posted}}</td>
                    <td>
                        <a href="{{Route('post.edit',$post)}}">Editar</a>
                        <a href="{{Route('post.show',$post)}}">Ver</a>
                        <form action="{{Route('post.destroy',$post)}}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$posts->links()}}

@endsection
