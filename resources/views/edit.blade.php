@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>show details product</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a href="{{ route('welcome') }}" class="btn btn-success">back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row text-capitalize border rounded-2">
            <div class="col-lg-12 margin-tb p-4">
                <div class="pull-left text-center">
                    <h2 class="text-decoration-underline text-success">Create Product</h2>
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Input file</label>
                    <input class="form-control form-control-sm" name="image" value="{{ $product->image }}" id="formFileSm" type="file">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Product name</label>
                    <input type="name" name="name" value="{{ $product->name }}" class="form-control" id="exampleFormControlInput1" placeholder="Product name...">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product dedail</label>
                    <textarea name="detail" value="{{ $product->detail }}" class="form-control" id="exampleFormControlTextarea1" rows="3"  placeholder="Text Detail of your Product...">{{ $product->detail }}</textarea>
                </div>
                <div class="mb-3">
                    <img src="/images/{{ $product->image }}" alt="" width="20%">
                </div>
                <button type="submit" class="btn btn-success">Create New Project</button>
            </div>
        </div>
    </form>

@endsection