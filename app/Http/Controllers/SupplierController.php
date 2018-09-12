<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Http\Resources\Supplier as SupplierResource;
use App\Http\Requests;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Suppliers
        $suppliers = Supplier::paginate(100);

        //Return collection of suppliers as resource
        return SupplierResource::collection($suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create supplier model
        $supplier = new Supplier;

        //Fill supplier model with values
        $supplier->delivery_id = $request->delivery_id;
        $supplier->delivery_date = $request->delivery_date;

        //Save New Supplier
        if ($supplier->save()){
            return new SupplierResource($supplier);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //Get the supplier
        $the_supplier = Supplier::where('supplier_id',$supplier->supplier_id)->first();

        //Return the supplier
        return new SupplierResource($the_supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
         //Get the supplier
         $the_supplier = Supplier::where('supplier_id',$supplier->supplier_id)->first();

         //Return the supplier
         return new SupplierResource($the_supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //Get the supplier
        $the_supplier = Supplier::where('supplier_id',$supplier->supplier_id)->first();

        //Update the supplier
        $supplier->delivery_id = $request->delivery_id;
        $supplier->delivery_date = $request->delivery_date;

        //Return supplier if updated
        if ($supplier->update()){
            return new SupplierResource($supplier);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //Get the supplier
        $the_supplier = Supplier::where('supplier_id',$supplier->supplier_id)->first();

        //Delete the supplier and return deleted sipplier
        if($the_supplier->delete()){
            return new SupplierResource($the_supplier);
        }
    }
}
