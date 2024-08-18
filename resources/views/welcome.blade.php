@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Employee</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a href="{{ route('create') }}" class="btn btn-success">Create New Product</a>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>
                {{$message}}
            </p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="30px">ID</th>
            <th width="40px">Image</th>
            <th>produst Name</th>
            <th>Detail</th>
            <th width="215px">Actions</th>
        </tr>
        
        @foreach ( $products as $items )
        <tr>
            <td>{{ $items->id}}</td>
            <td><img src="/images/{{ $items->image }}" class="rounded-1 text-center" width="50px"></td>
            <td>{{ $items->name }}</td>
            <td>{{ $items->detail }}</td>
            <td>
                <form action="{{ route('destroy', $items->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('show', $items->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('edit', $items->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection