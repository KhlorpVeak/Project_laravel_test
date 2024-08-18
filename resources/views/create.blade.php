@extends('app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row text-capitalize border rounded-2">
            <div class="col-lg-12 margin-tb p-4">
                <div class="pull-left text-center">
                    <h2 class="text-decoration-underline text-success">Create Product</h2>
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Input file</label>
                    <input class="form-control form-control-sm" name="image" id="formFileSm" type="file">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product name</label>
                    <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Product name...">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product dedail</label>
                    <textarea name="detail" class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Text Detail of your Product..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Create New Project</button>
            </div>
        </div>
    </form>
@endsection