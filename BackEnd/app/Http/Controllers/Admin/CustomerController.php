<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\Customer\CustomerServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Claims\Custom;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Customer::class);
        try{
            $customers =  $this->customerService->all($request);
            $params = ['customers' => $customers];
            return view('admin.customers.index', $params);
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }


    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $this->authorize('view', Customer::class);
        try{
            $customer =  $this->customerService->find($id);
            $params = ['customer' => $customer];
            return view('admin.customers.show', $params);
        }catch(\Exception $e){
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $this->authorize('delete', Customer::class);
        try {
            DB::beginTransaction();
            $customer = $this->customerService->find($id);
            $customer->delete();
            DB::commit();
            $messages = 'Xóa thành công ' . $customer->name;
            Session::flash('success',$messages );
            return redirect()->route('customer.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            $messages = 'Xóa không thành công ' . $customer->name;
            Session::flash('error',$messages );
            return redirect()->route('customer.index');
        }
    }
    public function getTrash()
    {
        try {
            $customers = $this->customerService->getTrash();
            $params = ['customers' => $customers];
            return view('admin.customers.recycle', $params);
        } catch (Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }
    public function restore($id)
    {
        $this->authorize('restore',Customer::class);
        try {
            DB::beginTransaction();
            $this->customerService->restore($id);
            DB::commit();
            $messages = 'Khôi phục thành công ';
            Session::flash('success',$messages );
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            $messages = 'Khôi phục không thành công ';
            Session::flash('error',$messages );
            return redirect()->route('customer.index');
        }
    }
    public function forceDelete($id)
    {
        $this->authorize('forceDelete', Customer::class);
        try {
            DB::beginTransaction();
            $this->customerService->forceDelete($id);
            DB::commit();
            $messages = 'Xóa thành công ';
            Session::flash('success',$messages );
            return redirect()->route('customer.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            $messages = 'Xóa không thành công ';
            Session::flash('error',$messages );
            return redirect()->route('customer.index');
        }
    }

}
