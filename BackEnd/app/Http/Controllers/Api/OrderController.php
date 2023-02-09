<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\SendMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\Ward;
use App\Services\Order\OrderServiceInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
    try{
        $provinces = Province::all();
        $district = District::all();
        $ward = Ward::all();
        $params = [
            'provinces' => $provinces,
            'district' => $district,
            'ward' => $ward,
        ];
        return response()->json($params);
    }catch(\Exception $e){
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }
    }

    function getAllProvince() {
    try{
        $provinces = Province::all();
        return response()->json($provinces);
    }catch(\Exception $e){
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }
    }

    function getAllDistrictByProvinceId($id) {
    try{
        $districts = District::where('province_id', '=', $id)->get();
        return response()->json($districts);
    }catch(\Exception $e){
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }
    }
    function getAllWardByDistrictId($id) {
    try{
        $wards = Ward::where('district_id', '=', $id)->get();
        return response()->json($wards);
    }catch(\Exception $e){
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(StoreOrderRequest $request) {
        try{
        $order = new Order;
        $order->note = $request->note;
        $order->address = $request->address;
        $order->province_id = $request->province_id;
        $order->district_id = $request->district_id;
        $order->ward_id = $request->ward_id;
        $order->name_customer = $request->name_customer;
        $order->customer_id = $request->customer_id;
        $order->phone = $request->phone;
        $order->total = 0;
        $order->save();
        $carts = Cache::get('carts');
        $order_total_price = 0;
        foreach ($carts as $productId => $cart) {
            $order_total_price += $cart['price'] * $cart['quantity'];
            OrderDetail::create([
                'price_at_time' => $cart['price'],
                'quantity' => $cart['quantity'],
                'product_id' => $productId,
                'total' => $cart['price'] * $cart['quantity'],
                'order_id' => $order->id,
            ]);
            Product::where('id', $productId)->decrement('quantity', $cart['quantity']);
        }
        $id_order = $order->id;
        $order->total= $order_total_price;
        $order->save();
        Cache::forget('carts');
        $carts = Cache::get('carts');
        $order = $this->orderService->find($id_order);
        $customer = Customer::findOrFail($request->customer_id);
        $orderDetails = $order->orderDetails;
        $orderStatus = 'Bạn Đã Đặt Mua Những Sản Phẩm Sau:';
        $params = [
            'orderStatus' => $orderStatus,
            'order' => $order,
            'orderDetails' => $orderDetails,
        ];
       
        Mail::send('admin.emails.orders', compact('params'), function ($email) use($customer) {
            $email->subject('TCC-Shop');
            $email->to($customer->email,$customer->name);
        });
      
        return response()->json(Order::with(['orderDetails'])->find($order->id));
        

        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
    try{
        return response()->json(Order::with(['province', 'district', 'ward', 'orderDetails' => function ($query) {
            return $query->with(['products']);
        }])->find($id));
    }catch(\Exception $e){
        Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
    public function listorder($id){
        try{
            return response()->json(Customer::with(['orders' => function ($query) {
                return $query->with(['orderDetails'=> function ($query) {
                    return $query->with(['products']);
                }]);
            }])->find($id));
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }
    
}