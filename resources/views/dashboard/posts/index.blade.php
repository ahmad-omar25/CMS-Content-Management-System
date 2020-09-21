@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <table class="table" id="datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>Description</th>
                <th>Post By</th>
                <th>Post Status</th>
                <th>Category</th>
                <th>image</th>
                <th>Comments Count</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $index=>$post)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$post->title}}</td>
                <td>{!! \Illuminate\Support\Str::limit($post->description, 30, '...') !!}</td>
                @if ($post->has('user'))
                    <td>{{$post->user->name}}</td>
                @endif
                <td>{{$post->status}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->media->count()}}</td>
                <td>{{$post->comments->count()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

