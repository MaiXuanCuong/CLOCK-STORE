<?php
namespace App\Services\Brand;

use App\Services\ServiceInterface;

interface BrandServiceInterface extends ServiceInterface
{
    public function getTrash($request);
    public function restore($id);
    public function forceDelete($id);
}
