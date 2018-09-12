<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Resources\Product as ProductResource;
use App\Http\Requests;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Products
        $products = Product::paginate(100);
        
        //Return collection of products as resource
        return ProductResource::collection($products);
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
        //Create product model
        $product = new Product;

        //Fill product model with values
        $product->supplier_id = $request->supplier_id;

        //Save new product 
        if ($product->save()){
            return new ProductResource($product);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
         //Get the product
         $the_product = Product::where('product_id',$product->product_id)->first();

         //Return the product
         return new ProductResource($the_product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         //Get the product
        $the_product = Product::where('product_id',$product->product_id)->first();

        //Update the product
        $product->supplier_id = $request->supplier_id;

        //Return product if updated
        if ($product->update()){
            return new ProductResource($product);
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         //Get the product
        $the_product = Product::where('product_id',$product->product_id)->first();

        //Delete the product and return deleted sipplier
        if($the_product->delete()){
            return new ProductResource($the_product);            
        }
    }
}
