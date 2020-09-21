@extends('dashboard.layout.app')
@section('content')
    <div class="row">
        <table class="table" id="datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Posts Count</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $index=>$category)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->status}}</td>
                <td>{{$category->posts->count()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

