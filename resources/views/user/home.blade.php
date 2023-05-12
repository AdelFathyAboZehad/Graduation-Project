@extends('layouts.app')
@section('content')



<a href="{{url('user/view-history')}}" style="text-decoration: none;">
    <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
        view history
    </div>
</a>
<div class="container">
    @foreach ($showProducts as $product)
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset('images/'.$product->image)}}" class="img-responsive" style="width: 300px; height: 300px; overflow: hidden;">
      </div>
        <div class="col-md-9 text-center">
            <h2> name :{{$product->name}}</h2>
            <h2> price :{{$product->price}}</h2>
            <a href="{{url('user/session/add_to_cart',$product->id)}}" class="btn btn-primary">add To cart</a><br><br>
        </div>
    </div>
    <hr>
    @endforeach
    
</div>
@endsection
