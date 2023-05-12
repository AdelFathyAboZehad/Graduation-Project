
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<br />
<h2>Add new Product</h2>
<table class="table">
    <form method="post" action="{{url('admin/add/save')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <tr>
            <td>name:</td>
            <td> <input name="name" placeholder="product name" /></td>
        </tr>
        <tr>
            <td>img: </td>
            <td><input type="file" name="img" src="{{ old('img')}}" /></td>
        </tr>
        <tr>
            <td>price: </td>
            <td><input name="price" placeholder="product price"/></td>
        </tr>
        <tr>
            <td>quantity: </td>
            <td><input name="quantity" placeholder="product quantity" /></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" class="btn btn-success btn-lg">Add</button></td>

        </tr>
    </form>
</table>

