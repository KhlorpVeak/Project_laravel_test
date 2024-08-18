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
    
    <div class="row">
        <div class="col">
            <div class="panel">
                <div class="panel-body">
                    <div class="row-2">
                        <div class="col">
                            <img src="{{ asset('storage/'.$product->image) }}" class="img-responsive" alt="">
                        </div>
                        <div class="col">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->detail }}</p>
                            <img src="/images/{{ $product->image }}" alt="" width="30%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection