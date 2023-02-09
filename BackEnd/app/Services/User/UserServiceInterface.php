<?php

namespace App\Services\User;

use App\Services\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function getTrashed();
    public function addAvatar($request);
    public function provinces();
    public function districts();
    public function wards();
    public function restore($id);
    public function force_destroy($id);
    public function update_info($request,$id);
}
