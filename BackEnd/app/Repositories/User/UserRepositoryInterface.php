<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;


interface UserRepositoryInterface extends RepositoryInterface
{
    public function all($request);
    public function getTrashed();
    public function restore($id);
    public function force_destroy($id);
    // public function addAvatar($data);
    public function provinces();
    public function districts();
    public function wards();
    // public function delete($id);
    public function update_info($request, $id);
}
