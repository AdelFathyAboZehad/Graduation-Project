
@extends('layouts.app')
@section('content')

<a href="{{url('admin/insert_page')}}" style="text-decoration: none;"><div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">insert</div></a>
<div class="container">
    @foreach ($showProducts as $product)
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset('images/'.$product->image)}}" class="img-responsive" style="width: 300px; height: 300px; overflow: hidden;">
        </div>
        <div class="col-md-9 text-center">
            <h2> name :{{$product->name}}</h2>
            <h2> price :{{$product->price}}</h2>
            <h2> quantity :{{$product->quantity}}</h2>
            <a href="{{url('admin/edit',$product->id)}}" class="btn btn-primary">edit</a><br><br>
            <a href="{{url('admin/delete',$product->id)}}" class="btn btn-primary">delete</a>
        </div>
    </div>
    <hr>
    @endforeach
    
</div>







{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello {{Auth::user()->name }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <center>
        <button class="btn">
            <a href="{{ route('insert_page') }}" class="btn btn-success">insert products</a>
        </button>
    </center>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
