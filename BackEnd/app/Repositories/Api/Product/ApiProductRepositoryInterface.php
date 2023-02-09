<?php
namespace App\Repositories\Api\Product;

use App\Repositories\Api\RepositoryInterface;

interface ApiProductRepositoryInterface extends RepositoryInterface{
    public function getAll();
    public function search($request);
    public function find($id);
    public function trendingProduct();
    public function find_images($id);
}
