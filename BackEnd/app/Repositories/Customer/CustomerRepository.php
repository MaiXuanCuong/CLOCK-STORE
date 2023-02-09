<?php
namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\BaseRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Route;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    function getModel()
    {
        return Customer::class;
    }

    public function all($request)
    {
        $customers = $this->model->select('*');
        if (!empty($request->search)) {
            $search = $request->search;
            $customers = $customers->Search($search);
        }
        $customers->filterName($request);
        $customers->filterPhone($request);
        $customers->Email($request);
        return $customers->orderBy('customers.id', 'DESC')->paginate(5);
    }

    public function changeStatus($id,$data){
        $object = $this->model->find($id);
        return $object->update($id,$data);

    }
    public function getTrash()
    {
        return  $this->model->onlyTrashed()->paginate(8);
    }
    public function restore($id){
        return  $this->model->withTrashed()->where('id', $id)->restore();
    }
    public function forceDelete($id)
    {
        return  $this->model->withTrashed()->where('id', $id)->forceDelete();

    }

}