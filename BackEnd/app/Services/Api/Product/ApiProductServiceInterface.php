<?php
namespace App\Services\Api\Product;


interface ApiProductServiceInterface
{
    public function getAll();
    public function search($request);
    public function find($id);
    public function trendingProduct();
    public function find_images($id);
}
