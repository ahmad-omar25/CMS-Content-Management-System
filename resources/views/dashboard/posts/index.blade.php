@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <table class="table" id="datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>content</th>
                <th>Category</th>
                <th>image</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $index=>$post)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->image}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

