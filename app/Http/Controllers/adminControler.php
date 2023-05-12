<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use App\Http\Controllers\Auth;
use App\product;
class adminControler extends Controller
{
    public function __construct()
    {
        $this->middleware('admin') ;
    }
   
    public function showProducts()
    {
    
        $showProducts=product::all();
        return view('admin.home',compact('showProducts'));
    }
   
     public function insert_page()
    {
        return view('admin.add_new');
    }
    public function add(Request $request)
    {
        $Addproduct=new product;
        $Addproduct->name=$request->input('name');
        $file=$request->file('img');
        $filename=$file->getClientOriginalName();
        $file->move('images',$filename);
        $Addproduct->image=$filename;
        $Addproduct->price=$request->input('price');
        $Addproduct->quantity=$request->input('quantity');
        $Addproduct->save();
        return redirect('admin/home');
    }
    public function view_edit($id)
    {
        $EditProduct=product::find($id);
        return view('admin.edit_page',compact('EditProduct'));
    }
    public function edit($id,Request $request)
    {
        $Editprod=product::find($id);
        $Editprod->name=$request->input('name');
        $Editprod->price=$request->input('price');
        $Editprod->quantity=$request->input('quantity');
        $Editprod->save();
        // Edit session
        $Editcart = session()->get('cart');
        $Editcart[$id]['name']=$request->input('name');
        $Editcart[$id]['price']=$request->input('price');
        session()->put('cart',$Editcart);
        return redirect('admin/home');
    }

    public function delete($id)
    {
        $Deleteproduct=product::find($id);
        $Deleteproduct->delete();
        // deletet session
        $Deletecart = session()->get('cart');
        unset($Deletecart[$id]);
        session()->put('cart',$Deletecart);
        return redirect('admin/home');
    }
}
