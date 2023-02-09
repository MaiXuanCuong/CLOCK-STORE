<?php
namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface{
    function getModel(){
        return Order::class;
    }
    public function getAllWithPaginateLatest($request)
    {
        $orders = $this->model->select('*');
        if (!empty($request->search)) {
            $search = $request->search;
            $orders = $orders->Search($search);
        }
        $orders->filterPrice(request(['startPrice', 'endPrice']));
        $orders->filterDate(request(['start_date', 'end_date']));
        $orders->status($request);
        return $orders->orderBy('orders.id', 'DESC')->paginate(5);
    }
    function updateSingle($id){
        $order = $this->model->find($id);
        $order->update(['status' => 1]);
        return $order;
    }
    function updateProduct($id){
        $order = $this->model->find($id);
        $orderDetails = $order->orderDetails;
        foreach ($orderDetails as $orderDetail) {
           $products = $orderDetail->products;
           $quantity = ($products->quantity - $orderDetail->quantity) ;
           $products->update(['quantity' => $quantity]);
        }
    }
}