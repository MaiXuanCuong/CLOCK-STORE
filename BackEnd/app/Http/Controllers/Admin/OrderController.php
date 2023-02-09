<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Services\Order\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $orderService;
    function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Order::class);
    try{
        $orders = $this->orderService->getAllWithPaginateLatest($request);
        $params = [
            'orders' => $orders,
        ];
        // dd($orders);
        return view('admin.orders.index', $params);
    }catch(\Exception $e){
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Order::class);
    try{
        $order = $this->orderService->find($id);
        $orderDetails = $order->orderDetails;
        $params = [
            'order' => $order,
            'orderDetails' => $orderDetails,
        ];
        // dd($orderDetails);
        return view('admin.orders.show', $params);
    }catch(\Exception $e){
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    function updateSingle($id){
        $this->authorize('status', Order::class);
    try{
        
        $this->orderService->updateSingle($id);
        $this->orderService->updateProduct($id);
        $order = $this->orderService->find($id);
        $customer = Customer::findOrFail($order->customer->id);
        $orderDetails = $order->orderDetails;
        $orderStatus = 'Đơn hàng đã được duyệt, bàn giao cho đơn vị vận chuyển.';
        $params = [
            'orderStatus' => $orderStatus,
            'order' => $order,
            'orderDetails' => $orderDetails,
        ];
       
        Mail::send('admin.emails.orders', compact('params'), function ($email) use($customer) {
            $email->subject('TCC-Shop');
            $email->to($customer->email,$customer->name);
        });
        Session::flash('success', config('define.accept.succes'));
        return redirect()->route('order.index');
    }catch(\Exception $e){
        Session::flash('error', config('define.accept.error'));
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
