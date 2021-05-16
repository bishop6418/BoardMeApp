<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function userData($user, $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = $request->password;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        // $role = Role::all();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPostRequest $request)
    {
        $request->password = Hash::make($request->password);

        $user = new User();
        $this->userData($user, $request);
        $user->save();

        $role = DB::table('roles')->where('name', $request->role)->first();

        if($role == null)
        {
            $role = new Role();
            $role->name = $request->role;
            $role->save();
        }

        $user->assignRole($request->role);
        return response(['user' => $this->show($user->id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if( hashChecker($request->password) == 'false' ){
            $request->password = Hash::make($request->password);
        }

        $user = User::findOrFail($id);
        $this->userData($user, $request);
        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return 'success';
    }
}
