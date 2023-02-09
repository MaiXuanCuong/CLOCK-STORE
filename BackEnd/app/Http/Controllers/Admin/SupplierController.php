<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Services\Supplier\SupplierServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    private $supplierService;
    public function __construct(SupplierServiceInterface $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Supplier::class);
        $suppliers = $this->supplierService->all($request);
        return view('admin.suppliers.index',compact('suppliers'));
    }
    public function show($id){

    }

    public function create()
    {
        $this->authorize('create', Supplier::class);
        return view('admin.suppliers.add');
    }

    public function store(StoreSupplierRequest $request)
    {
        $data = $request->all();
        try {
            $this->supplierService->create($data);
             Session::flash('success', config('define.store.succes'));
            return redirect()->route('supplier.index');
        } catch (\Exception $e) {
            Session::flash('error',  config('define.store.error'));
            Log::error('message:'. $e->getMessage());
            return redirect()->route('supplier.index');
        }
    }

    public function edit($id)
    {
        $this->authorize('update', Supplier::class);
        $item = $this->supplierService->find($id);
        return view('admin.suppliers.edit',compact('item'));
    }

    public function update(UpdateSupplierRequest $request,$id)
    {
        // dd($request);
        $data = $request->all();
        try {
            $this->supplierService->update($data, $id);
            Session::flash('success', config('define.update.succes'));
            return redirect()->route('supplier.index');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.update.error'));
            return redirect()->route('supplier.index');
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete', Supplier::class);
        try {
            $category = $this->supplierService->delete( $id);
            Session::flash('success', config('define.recycle.succes'));
            return redirect()->route('supplier.index');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.recycle.error'));
            return redirect()->route('supplier.index');
        }
    }

    public function getTrashed(Request $request){
        $suppliers = $this->supplierService->getTrashed($request);
        return view('admin.suppliers.recycle',compact('suppliers'));
    }

    public function restore($id)
    {
        $this->authorize('delete', Supplier::class);
        try {
            $this->supplierService->restore($id);
            Session::flash('success', config('define.restore.succes'));
            return redirect()->route('supplier.getTrashed');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.restore.error'));
            return redirect()->route('supplier.getTrashed');
        }
    }

    public function force_destroy($id)
    {
        $this->authorize('forceDelete', Supplier::class);
        try {
            $category = $this->supplierService->force_destroy( $id);
            Session::flash('success', config('define.delete.succes'));
            return redirect()->route('supplier.getTrashed');
        } catch (Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.delete.error'));
            return redirect()->route('supplier.getTrashed');
        }
    }
}
