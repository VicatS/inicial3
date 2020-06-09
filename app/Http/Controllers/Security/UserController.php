<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Security\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveaccess', 'user.index');
        $users = User::with('roles')
            ->orderBy('id', 'desc')->paginate();

        return view('user.index', compact('users'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$this->authorize('create', User::class);
        return 'create';*/
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /*
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', [$user, ['user.show', 'userown.show']]);
        $roles = Role::orderBy('name', 'asc')->get();

        return view('user.show', compact('roles', 'user'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit', 'userown.edit']]);
        $roles = Role::orderBy('name', 'asc')->get();

        return view('user.edit', compact('roles', 'user'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:50|unique:users,name,' . $user->id,
            'email' => 'required|max:50|unique:users,email,' . $user->id
        ]);

//        dd($request->all());
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('user.index')
            ->with('status_success', 'User updated successfully');

    }

    /*
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('haveaccess', 'user.destroy');
        $user->delete();

        return redirect()->route('user.index')
            ->with('status_success', 'User successfully removed.');
    }
}
