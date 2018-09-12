<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Resources\Order as OrderResource;
use App\Http\Requests;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get orders
        $orders = Order::paginate(100);

        //Return collection of orders as resource
        return OrderResource::collection($orders);
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
        //Create order model
        $order = new Order;

        //Fill order model with values
        $order->order_date = $request->order_date;
        $order->headquarters_id = $request->headquarters_id;

        //Save new order 
        if ($order->save()){
            return new OrderResource($order);
        }      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //Get the order
         $the_order = Order::where('order_id',$order->order_id)->first();

        //Return the order
        return new OrderResource($the_order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //Get the order
        $the_order = Order::where('order_id',$order->order_id)->first();

        //Update the order
        $the_order->order_date = $request->order_date;
        $the_order->headquarters_id = $request->headquarters_id;

        //Return order if updated
        if ($the_order->update()){
            return new OrderResource($the_order);
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //Get the order
        $the_order = Order::where('order_id',$order->order_id)->first();

        //Delete the order and return deleted sipplier
        if($the_order->delete()){
            return new OrderResource($the_order);            
        }
    }
}
