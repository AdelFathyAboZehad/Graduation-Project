
@extends('layouts.app')
@section('content')

<a href="{{url('user/home')}}" style="text-decoration: none;">
    <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
        view home
    </div>
</a>
<div class="container">
 
    @if(count($yourProducts)>0)
    <table class="table table-dark">
        <tr>
            <th>product name</th>
            <th>product quantity</th>
            <th>product image</th>
        </tr>
            @foreach ($yourProducts as $yourProduct)<tr>
                {{-- <td class=" text-center"> {{ $yourProduct->key }}</td> --}}
                <td class=" text-center"> {{ $yourProduct['name'] }}</td>
                <td class=" text-center"> {{ $yourProduct['num'] }}</td>
                <td class=" text-center">
                    <img src="{{asset('images/'.$yourProduct['image'])}}" class="img-responsive" style="width: 200px; height: 200px; overflow: hidden;">
                </td>
            </tr>
            <hr>
            @endforeach
    </table>
    @endif
</div>
@endsection
