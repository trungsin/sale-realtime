<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Models\TeamUser;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * Class SizeController.
 */
class UserController extends AdminController
{
    /**
     * Function constructor.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show all user.
     *
     * @param
     *
     * @return view
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show form add user.
     *
     * @return view
     */
    public function create()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $team = TeamUser::all();
        $role = Role::findByName('Admin');
        if (!$currentuser->hasRole($role)) {
            return abort(404, 'Page not found');
        }

        return view('admin.user.add', [
            'teams' => $team,
        ]);

    }

    /**
     * Add a new size.
     *
     * @return mixed
     */
    public function store(UserRequest $request)
    {
        // add data
        $param = $request->only('name', 'email', 'password');
        $param['password'] = Hash::make($param['password']);
        $result = User::create($param);

        if (!$result) {
            return redirect()->route('admin.users.create')
                ->with('error', 'User adding is failed.')
            ;
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User adding is successful')
        ;
    }

    /**
     * Get and show form current size.
     *
     * @param number $id
     *
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::all();

        if (!$user) {
            return abort(404, 'Page not found');
        }

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Edit current brand.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update(UserRequest $request, $id)
    {
        // get old image path before update
        $user = User::find($id);
        // add data
        $param = $request->only('name', 'email', 'password', 'role');
        $user->name = $param['name'];
        $user->email = $param['email'];

        if (isset($param['role']) && '' != $param['role']) {
            $role = Role::findByName($param['role']);
            if ($role) {
                $user->syncRoles($role);
            }
        }

        if ($request->has('role') && '' == $param['role']) {
            $role = $user->roles()->pluck('name')->pop();
            if (isset($role))
            {
                $roleUser = Role::findByName($role);
                $user->removeRole($roleUser);
            }
        }

        if ('' != $param['password']) {
            $user->password = Hash::make($param['password']);
        }
        $userEdit = Auth::user();
        if (!$userEdit->can('update', $user)) {
            return redirect()->route('admin.users.index')->with('error', 'Need permission');
        }

        if (!$user->save()) {
            return redirect()->route('admin.users.edit' . ['id' => $id])
                ->with('error', 'User editing is failed.')
            ;
        }

        return redirect()->route('admin.users.index')->with('success', 'User editing is successful');
    }

    // /**
    //  * Delete current size
    //  *
    //  * @param
    //  * @return view
    //  */
    public function destroy(Request $request, $id)
    {
        $result = User::find($id)->delete();
        if (!$result) {
            return redirect()->route('admin.users.index')
                ->with('error', 'size deleting is failed.')
            ;
        }

        return redirect()->route('admin.users.index')->with('success', 'User deleting is successful');
    }
}
