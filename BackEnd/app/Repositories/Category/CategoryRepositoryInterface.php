<?php
namespace App\Repositories\Category;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface{
    public function all($request);
    public function getTrashed($requets);
    public function restore($id);
    public function force_destroy($id);

}
