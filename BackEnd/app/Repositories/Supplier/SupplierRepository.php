<?php
namespace App\Repositories\Supplier;

use App\Models\Supplier;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Log;

class SupplierRepository extends BaseRepository implements SupplierRepositoryInterface{

    function getModel()
    {
        return Supplier::class;
    }
    public function all($request)
    {
        $suppliers = $this->model->select('*');

        if (!empty($request->search)) {
            $search = $request->search;
            $suppliers = $suppliers->Search($search);
        }
        return $suppliers->orderBy('id','DESC')->paginate(5);
    }
    public function update($data, $id ){

        $supplier = $this->model->find($id);
        try {
            $supplier->name = $data['name'];
            $supplier->email = $data['email'];
            $supplier->address = $data['address'];
            $supplier->phone = $data['phone'];
            $supplier->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $supplier;
    }
    public function delete($id){
        $supplier = $this->model->find($id);
        try {
            $supplier->delete();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $supplier;
    }
    public function getTrashed($request){
        $query = $this->model->onlyTrashed();
        if (!empty($request->search)) {
            $search = $request->search;
            $query = $query->Search($search);
        }
        return $query->orderBy('id','DESC')->paginate(5);
    }
    public function restore($id){
        $supplier = $this->model->withTrashed()->findOrFail($id);
        $supplier->restore();
        return $supplier;
    }
    public function force_destroy($id){
        $supplier = $this->model->onlyTrashed()->findOrFail($id);
        $supplier->forceDelete();
        return $supplier;
    }


}
