<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Security\Permission;
use App\Models\Security\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate();

        return view('role.index', compact('roles'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('role.create', compact('permissions'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:roles,name',
            'slug' => 'required|max:50|unique:roles,slug',
            'full_access' => 'required|in:yes,no'
        ]);

        $role = Role::create($request->all());

        $permission = $request->get('permission');
        if ($permission) {
            $role->permissions()->sync($permission);
        }

        return redirect()->route('role.index')
            ->with('status_success', 'Role saved successfully');
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission_role = [];

        foreach ($role->permissions as $permission) {
            $permission_role[] = $permission->id;
        }

        $permissions = Permission::get();

        return view('role.edit', compact('permissions', 'role', 'permission_role'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:50|unique:roles,name,' . $role->id,
            'slug' => 'required|max:50|unique:roles,slug,' . $role->id,
            'full_access' => 'required|in:yes,no'
        ]);

        $role->update($request->all());

        $permission = $request->get('permission');
        if ($permission) {
            $role->permissions()->sync($permission);
        }

        return redirect()->route('role.index')
            ->with('status_success', 'Role updated successfully');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
