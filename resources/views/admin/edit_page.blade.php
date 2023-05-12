
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<table class="table table-responsive">
    <tr><th>id</th><th>name</th><th>image</th><th>price</th><th>quantity</th><th>edit</th> </tr>

        <form method="post" action="{{url('admin/edit/save',$EditProduct->id)}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td>{{$EditProduct->id}}</td>
                <td><input name="name" value="{{$EditProduct->name}}" ></td>
                <td><img src="{{asset('images/'.$EditProduct->image)}}" style="width:100px;height: 100px;border-radius: 12px;" /></td>
                <td><input name="price" value="{{$EditProduct->price}}" ></td>
                <td><input name="quantity" value="{{ $EditProduct->quantity}}" ></td>
                <td><button type="submit" class="btn btn-primary">edit</button></td>

                <input type="hidden" name="id" value="{{$EditProduct->id}}" />
            </tr>
        </form>


</table>
