<?php

namespace App\Repositories\Group;

use App\Models\Group;
use App\Repositories\BaseRepository;

class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{

    public function getModel()
    {
        return Group::class;
    }
    public function all($request)
    {
        $group = $this->model->select('*');
        if (!empty($request->search)) {
            $search = $request->search;
            $group = $group->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%');

        }
        return $group->orderBy('id', 'DESC')->paginate(5);

    }

    public function update($id, $data)
    {
        $group = $this->find($id);
        $group->roles()->sync($data);
    }

    public function trashedItems()
    {
        $query = $this->model->onlyTrashed();
        return $query->orderBy('id', 'desc')->paginate(5);
    }

    public function restore($id)
    {

        $group = $this->model->withTrashed()->find($id);

        if ($group) {
            $group->restore();
            return true;
        } else {
            return false;
        }
        return $group;
    }

    public function force_destroy($id)
    {
        $group = $this->model->withTrashed()->find($id);
        if ($group) {
            $group->forceDelete();
            return $group;
        } else {
            return false;
        }
    }
}
