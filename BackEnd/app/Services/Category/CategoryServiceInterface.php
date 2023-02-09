<?php
namespace App\Services\Category;

use App\Services\ServiceInterface;

interface CategoryServiceInterface extends ServiceInterface
{
    public function getTrashed($request);
    public function restore($id);
    public function force_destroy($id);
}
