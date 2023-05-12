@extends('layouts.app')

@section('content')
<div class="container " >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"  
style="color: red;background-image:url('{{asset("images/5c27700142fb2.png")}}')">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{   session()->put('user_role',Auth::user()->role)  }}
                    {{-- {{ Auth::user()->role }}<br>
                   check {{ Auth::check() }}<br>
                    my session {{ session()->get('user_role') }} --}}
                    <br>
                    <center style="font-size:50px ">wellcome  {{ Auth::user()->name }}    you are a <!-- {{ Auth::user()->role }} --> 
                    @if (Auth::user()->role ==1)
                        admin  </center>
                        <a href="{{url('admin/home')}}" style="text-decoration: none;">
                            <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
                                go home
                            </div></a>
                    @elseif (Auth::user()->role ==0)
                         user </center>
                        <a href="{{url('user/home')}}" style="text-decoration: none;">
                            <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
                                go home
                            </div></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .aly{
        color: red;

    }
</style>
@endsection
