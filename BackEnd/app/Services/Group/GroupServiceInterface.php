<?php
namespace App\Services\Group;
use App\Services\ServiceInterface;

interface GroupServiceInterface extends ServiceInterface{
    public function trashedItems();
    // public function getTrashed();
    public function restore($id);
    public function force_destroy($id);
}
