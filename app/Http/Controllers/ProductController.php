<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'image'=>'required',
            'price'=>'required',
        ]);

        $imageName = 'images/product/'.uniqid().'-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('images/product'), $imageName);
        $data = $request->all();
        $data['image']=$imageName;
        Product::create($data);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required',
            'image'=>'required',
            'price'=>'required',
        ]);


        $oldImage = Product::find($id);
        $image = $request->file('image');

        if($image){

            // old image delete
            if(file_exists($oldImage->image)) {
                File::delete($oldImage->image);
            }
            $imageName = 'images/product/'.uniqid().'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('images/product'), $imageName);
        }else{
            $imageName = $oldImage;
        }
        $data = $request->all();
        $data['image']=$imageName;
        Product::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldData = Product::find($id);
        // old image delete
        if(file_exists($oldData->image)) {
            File::delete($oldData->image);
        }
        $oldData->delete();

        return redirect()->back();

}
}
