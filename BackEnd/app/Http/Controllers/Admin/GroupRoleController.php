<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRoleRequest;
use App\Http\Requests\UpdateGroupRoleRequest;
use App\Models\GroupRole;
class GroupRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupRole  $user_group_role
     * @return \Illuminate\Http\Response
     */
    public function show(GroupRole $groupRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupRole  $user_group_role
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupRole $grouprole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRoleRequest  $request
     * @param  \App\Models\GroupRole  $user_group_role
     * @return \Illuminate\Http\Response
     */
    public function update( GroupRole $grouprole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupRole  $grouprole
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupRole $grouprole)
    {
        //
    }
}
