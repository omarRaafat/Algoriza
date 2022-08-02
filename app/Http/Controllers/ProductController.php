<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(['products' => Product::latest()->paginate(10)   ,'categories' =>  Category::where('is_Active' , 1)->latest()->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('products.create')->with('categories' , Category::where('is_Active' , 1)->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_array = $request->all();
        // return $request_array;
        $image_file = $request->file('product_img');
        $image_name = $image_file->getClientOriginalName();
        $image_file->move('uploads/products/images', $image_name);
        $request_array['product_img'] = 'uploads/products/images/'. $image_name;
       Product::create($request_array);
       return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show')->with(['product' => Product::find($id) ,'categories' => Category::where('is_Active' , 1)->latest()->get()] );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,  $id)
    {
        $product = Product::find($id);
        $request_array = $request->all();
        // return $request_array;
        if($request->hasFile('product_img')){
            $image_file = $request->file('product_img');
            $image_name = $image_file->getClientOriginalName();
            $image_file->move('uploads/products/images', $image_name);
            $request_array['product_img'] = 'uploads/products/images/'. $image_name;
        }
      
       $product->update($request_array);
       return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        return view('home')->with(['categories' =>  Category::where('is_Active' , 1)->latest()->get(),'products' => Product::where('product_name','like', '%'.$request->filter_key.'%')->paginate(10)] );

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
