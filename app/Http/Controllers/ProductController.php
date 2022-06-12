<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\category;
use App\Models\product;
use App\Models\shop;
use App\Models\transaction_detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $data= product::paginate(5);
        $category = category::all();
        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

            return view('home', compact('data', 'cartdata','category'));
        } else {
            return view('home', compact('data', 'category'));
        }

    }
    public function details($id)
    {
        $data = product::find($id);
        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
            return view('details', compact('data', 'cartdata'));
        } else {
            return view('details', compact('data'));
        }
    }
    public function searchcategory($id){
        $data = product::where('category','=', $id)->paginate(5);
        $category= category::all();
        if(auth()->check() == true){
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('home', compact('data','cartdata','category'));
        }else{
            return view('home', compact('data','category'));
        }
    }
    public function search(Request $request){
        $search=$request->keyword;
        $searchcategory=$request->category;
        $category=category::all();

        if($searchcategory=='Categories'){
            $data = product::join('categories', 'products.category', '=', 'categories.id')
            ->select('products.*')
                ->where('products.name', 'LIKE', "%$search%")->paginate(5);
            if (auth()->check() == true) {
                $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
                return view('home', compact('data', 'cartdata','category'));
            } else {
                return view('home', compact('data','category'));
            }
        }else {
            # code...

            $data= product::join('categories', 'products.category', '=', 'categories.id')
                ->select('products.*')
                ->where('products.name', 'LIKE', "%$search%")
                ->where('categories.name', 'LIKE', "%$searchcategory%")->paginate(5);
            if (auth()->check() == true) {
                $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
                return view('home', compact('data', 'cartdata'));
            } else {
                return view('home', compact('data'));
            }
        }
    }
    public function profile()
    {
        $data = Auth::user();

        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

            return view('profile', compact('data', 'cartdata'));
        } else {
            return view('profile', compact('data'));
        }
    }
    public function myshop(){
        $shop=shop::where('user_id', '=', Auth::user()->id)->first();
        $data = product::where('shop_id', '=', $shop->id)->paginate(5);
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        $data2= transaction_detail::where('shop_id','=',$shop->id)->get();
         $revenue=0;
        $selleditem= 0;
        for($i=0;$i<count($data2);$i++){
        $revenue+= $data2[$i]->getProducts->price* $data2[$i]->quantity;
        $selleditem+= $data2[$i]->quantity;
    }
        return view('shop', compact('data', 'cartdata','shop', 'revenue', 'selleditem'));
    }
    public function newshop(){
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('newshop',compact('cartdata'));
    }
    public function shop($id){
        $shop = shop::where('id', '=', $id)->first();
        $data = product::where('shop_id', '=', $shop->id)->paginate(5);
        if(auth()->check() == true){
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('olshop', compact('data', 'cartdata', 'shop'));
        } else{
            return view('olshop', compact('data', 'shop'));
        }
    }
    public function createshop(Request $request){
        $data = $request->validate([
            'shopname'=>'required|string|min:5',
            'shopdescription'=>'required',
            'OpeningDay'=>'required',
            'ClosingDay'=>'required',
            'OpeningHours'=>'required|between:0,23',
            'ClosingHours'=> 'required|gt:OpeningHours|between:0,23|distinct:OpeningHours',
        ]);
        shop::create([
            'name' => $data['shopname'],
            'user_id' => auth()->user()->id,
            'desc' => $data['shopdescription'],
            'OpeningDay' => $data['OpeningDay'],
            'ClosingDay' => $data['ClosingDay'],
            'OpeningHours' => $data['OpeningHours'],
            'ClosingHours' => $data['ClosingHours'],
        ]);

        $data = shop::where('user_id', '=', Auth::user()->id)->first();

        return redirect('/shop')->with('data');
    }
    public function shopinfo($id){
        $data=shop::find($id);
        if (auth()->check() == true) {
            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

            return view('shopinfo', compact('data', 'cartdata'));
        } else {
            return view('shopinfo', compact('data'));
        }

    }
    public function managecategory(){
        $data=category::all();
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('managecategory', compact('data', 'cartdata'));
    }
    public function insertPage(){
        $data =category::all();
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('insert', compact('data', 'cartdata'));
    }
    public function insert(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'desc' => 'required',
            'price' => 'required|numeric|gte:0',
            'category' => 'required',
            'stock' => 'required|between:1,99'
        ]);
        $file = $request->file('image');
        $imageName=$file;
        if ($file != null) {
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/images/', $file, $imageName);
            $imageName = 'images/' . $imageName;
        }
        $shop = shop::where('user_id', '=', Auth::user()->id)->first();
        $category =category::where('name', $data['category'])->first();
        product::create([
            'name' => $data['name'],
            'image' => $imageName,
            'desc' => $data['desc'],
            'price' => $data['price'],
            'category' => $category->id,
            'stock' => $data['stock'],
            'shop_id'=>$shop->id
        ]);

        return redirect('/');
    }
    public function updatePage($id)
    {

        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data = product::where('id', $id)->first();
        $data2 = category::all();
        return view('updateproduct', compact('data', 'data2', 'cartdata'));
    }
    public function update(Request $request, $id){
        $data = $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'desc' => 'required',
            'price' => 'required|numeric|gte:0',
            'category' => 'required',
            'stock' => 'required|between:1,99'
        ]);
        $file = $request->file('image');
        $imageName = $file;
        $currproduct = product::where('id', '=', $id)->first();
        if ($file != null) {
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/images/', $file, $imageName);
            $imageName = 'images/' . $imageName;
            $currproduct->image=$imageName;
        }
        $shop = shop::where('user_id', '=', Auth::user()->id)->first();
        $category = category::where('name', $data['category'])->first();

        $currproduct->name= $data['name'];

        $currproduct->desc = $data['desc'];
        $currproduct->price = $data['price'];
        $currproduct->category = $category['id'];
        $currproduct->stock = $data['stock'];
        $currproduct->shop_id = $shop->id;
        $currproduct->save();
        return redirect('/');
    }
    public function delete($id)
    {
        product::where('id', $id)->delete();
        return redirect('/shop');
    }
    public function deletecategory($id)
    {
        category::where('id', $id)->delete();
        return redirect('/managecategory');
    }
    public function updatecategoryPage($id){
        $category=category::all();
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        $data = category::find($id);
        return view('updatecategory', compact('data', 'cartdata','category'));
    }
    public function updatecategory(Request $request,$id){
        $rules = [
            'name' => 'required|unique:App\Models\category,name'
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }
        $currcategory = category::find($id);
        $currcategory->name = $request->name;
        $currcategory->save();
        return redirect('/');
    }
    public function insertcategoryPage(){
        $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('insertcategory', compact('cartdata'));
    }
    public function insertcategory(Request $request){
        $rules = [
            'name' => 'required|unique:App\Models\category,name'
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }
        $data = new category();
        $data->name = $request->name;
        $data->save();
        return redirect('/managecategory');
    }
}
