<?php

namespace App\Repositories\Group;

use App\Repositories\RepositoryInterface;

interface GroupRepositoryInterface extends RepositoryInterface
{
    public function trashedItems();
    public function all($request);
    // public function getTrashed();
    public function restore($id);
    public function force_destroy($id);
}
