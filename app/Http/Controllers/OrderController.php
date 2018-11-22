<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\Orders\OrderCollection;
use App\Http\Resources\Orders\OrderResource;
use App\Model\Item;
use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderCollection::collection(Order::paginate(10));
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
    public function store(OrderRequest $request)
    {
        $order = new Order;
        $order->cid = $request->cid;
        $order->charges = $request->charges;
        $order->subtotal = $request->subtotal;
        $order->total = $request->total;
        $order->name = $request->customer['name'];
        $order->email = $request->customer['email'];
        $order->contact = $request->customer['contact'];
        $order->device_token = $request->device_token;
        $order->created = $request->created;
        $order->save();

        $order_id= $order->id;
        foreach ($request->orders as $key => $value) {
            $orderDetail = new OrderDetail;
            $orderDetail->order_id = $order_id;
            $orderDetail->orderNumber = $value['orderNumber'];
            $orderDetail->truckName = $value['truckName'];
            $orderDetail->created = $value['created'];
            $orderDetail->save();

            $order_detail_id= $orderDetail->id;
            foreach ($value['items'] as $key => $value) {
                $item = new Item;
                $item->order_detail_id = $order_detail_id;
                $item->description = $value['description'];
                $item->display_name = $value['display_name'];
                $item->f_id = $value['f_id'];
                $item->p_id = $value['p_id'];
                $item->price = $value['price'];
                $item->quantity = $value['quantity'];
                $item->total = $value['total'];
                $item->save();
            }
        }
        return response([
            'status'=>1,
            'message'=>'Order Added Successfully!'
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
         return [
            'status'=>1,
            'data'=>new OrderResource($order)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    // Admin Panel
    public function viewOrders(){
        $orders = Order::orderBy('id', 'DESC')->with(['orderDetails.items'])->get();
        $orders = json_decode(json_encode($orders));
        return view('admin.orders.view_orders')->with(compact('orders'));;
    }
}
