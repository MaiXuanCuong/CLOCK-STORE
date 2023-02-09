<?php

namespace App\Services\Group;

use App\Repositories\Group\GroupRepositoryInterface;
use App\Services\BaseService;

class GroupService extends BaseService implements GroupServiceInterface
{
    public $repository;

    public function __construct(GroupRepositoryInterface $GroupRepository)
    {
        $this->repository = $GroupRepository;
    }

    public function all($request)
    {
        return $this->repository->all($request);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create($request)
    {
        $user = $this->repository->create($request);
        return $user;
    }

    // public function update($request, $id)
    // {
    //     return $this->repository->update($request, $id);

    // }

    public function delete($id)
    {
        return $this->repository->delete($id);

    }

    public function trashedItems()
    {

        return $this->repository->trashedItems();

    }

    public function restore($id)
    {

        return $this->repository->restore($id);

    }

    public function force_destroy($id)
    {

        return $this->repository->force_destroy($id);

    }

}
