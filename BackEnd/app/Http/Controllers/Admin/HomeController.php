<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index()
    {
        // $room_count = Room::count();
        // $roomtype_vip = Room::where('room_types_id', '=', 1)->count();
        // $user_count = User::where('user_group_id', '!=', 1 )->count();
        // $customer_count = Customers::count();
        // $empty_room = Room::where('status','=',0)->count();
        // $busy_room = Room::where('status','=',1)->count();
        // $user_group_count = UserGroup::count();
        // $roomtype_count= Room::where('room_types_id', '!=', 1)->count();
        // $order_room = Booking::count();

        // $param =[
        //     'room_count' => $room_count,
        //     'roomtype_count' => $roomtype_count,
        //     'user_count' => $user_count,
        //     'customer_count' => $customer_count,
        //     'user_group_count' => $user_group_count,
        //     'empty_room' => $empty_room,
        //     'busy_room'=>$busy_room,
        //     'roomtype_vip'=>$roomtype_vip,
        //     'order_room'=>$order_room,
        // ];
        $totalPrice  =  Order::pluck('total')->sum();
        $totalOrders  =  Order::pluck('id')->count();
        $totalCustomer  =  Customer::pluck('id')->count();
        $topProducts = DB::table('order_details')
            ->leftJoin('products', 'products.id', '=', 'order_details.product_id')
            ->selectRaw('products.*, sum(order_details.quantity) totalProduct, sum(order_details.total) totalPrice')
            ->groupBy('order_details.product_id')
            ->orderBy('totalProduct', 'desc')
            ->take(5)
            ->get();
            $topCustomer = DB::table('customers')
            ->join('orders', 'customers.id', '=', 'orders.customer_id')
            ->selectRaw('customers.*, sum(orders.total) totalOrder')
            ->groupBy('customers.id')
            ->orderBy('totalOrder', 'desc')
            ->take(5)
            ->get();
        $params = [
            'totalPrice' => $totalPrice,
            'totalOrders' => $totalOrders,
            'totalCustomer' => $totalCustomer,
            'topProducts' => $topProducts,
            'topCustomer' => $topCustomer,
        ];
        return view('admin.home', $params);
    }
}
