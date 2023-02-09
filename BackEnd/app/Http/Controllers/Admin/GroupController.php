<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Models\Role;
use App\Models\Group;
use App\Services\Group\GroupServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{

    protected $groupService;

    public function __construct(GroupServiceInterface $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny',Group::class);
        $items = $this->groupService->all($request);
        $params =[
            'items' => $items,
        ];
        return view('admin.groups.index',$params);
    }

    public function create()
    {
        $this->authorize('create', Group::class);
        return view('admin.groups.add');
    }

    public function store(StoreGroupRequest $request)
    {
        try {
            $this->groupService->create($request->all());
            Session::flash('success', config('define.store.succes'));
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Session::flash('error', config('define.store.error'));
            Log::error('message:'. $e->getMessage());
            return redirect()->route('groups.index');
        }
    }
    public function edit($id)
    {
        $item = Group::find($id);
        $this->authorize('update', Group::class);
        $current_user = Auth::user();
        $userRoles = $item->roles->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'item' => $item,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.groups.edit',$params);
    }

    public function update( $id,Request $request)
    {
        try {
            $item = $this->groupService->update( $id, $request->roles);
            Session::flash('success', config('define.update.succes'));
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', config('define.update.error'));
            return redirect()->route('groups.index');
        }
    }

    public function destroy(Request $request,$id)
    {
        $this->authorize('delete', Group::class);
        try {
            $item = $this->groupService->delete($id);
            Session::flash('success', config('define.recycle.succes'));
            return redirect()->route('groups.index');
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            Session::flash('error', config('define.recycle.error'));
            return redirect()->route('groups.index');
        }
    }

    public function getTrashed()
    {
        $items = $this->groupService->trashedItems();
        $params = [
            'items' => $items,
        ];
        return view('admin.Groups.recycle',$params);
    }

    public function restore($id)
    {
        $this->authorize('restore',Group::class);
        try {
            $this->groupService->restore($id);
            Session::flash('success', config('define.restore.succes'));
            return redirect()->route('group.getTrashed');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', config('define.restore.error'));
            return redirect()->route('group.getTrashed');
        }
    }

    public function force_destroy($id)
    {
        $this->authorize('forceDelete', Group::class);
        try {
            $Group = $this->groupService->force_destroy($id);
            Session::flash('success', config('define.delete.succes'));
            return redirect()->route('group.getTrashed');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', config('define.delete.error'));
            return redirect()->route('group.getTrashed');
        }
    }

}
