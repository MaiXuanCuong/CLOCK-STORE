<?php
namespace App\Repositories\Supplier;

use App\Repositories\RepositoryInterface;

interface SupplierRepositoryInterface extends RepositoryInterface{
    public function all($request);
    public function getTrashed($request);
    public function restore($id);
    public function force_destroy($id);

}
