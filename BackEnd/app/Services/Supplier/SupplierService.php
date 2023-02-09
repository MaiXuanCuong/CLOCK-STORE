<?php

namespace App\Services\Supplier;

use App\Repositories\Supplier\SupplierRepositoryInterface;
use App\Services\BaseService;

class SupplierService extends BaseService implements SupplierServiceInterface {

    public $repository;
    public function __construct(SupplierRepositoryInterface $SupplierRepository)
    {
        $this->repository = $SupplierRepository;
    }
    public function all($request)
    {
        return $this->repository->all($request);
    }
    public function update($id, $data){
        return $this->repository->update($id, $data);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function getTrashed($request)
    {
        return $this->repository->getTrashed($request);
    }
    public function restore($id){
        return $this->repository->restore($id);
    }
    public function force_destroy($id){
        return $this->repository->force_destroy($id);
    }

}
