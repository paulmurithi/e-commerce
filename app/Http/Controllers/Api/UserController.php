<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

use App\Http\Requests\storeUser;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;

use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUser $request)
    {
        $validatedUser = $request->only(['name','email']);
        $validatedUser['password'] = Hash::make($request->password);

        $user = User::create($validatedUser);

        $roles = $request->roles;

        if(isset($roles)){
            foreach($roles as $role){
                $retrievedRole = Role::where('id', $role)->firstOrFail();
                $user->assignRole($retrievedRole);
            }
        }

        $user->refresh();

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUser $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedUser = $request->only(['username','email', 'password'])->validate();

        $user->fill($validatedUser)->save();
        $roles = $request->roles;

        if(isset($roles)){
            $user->syncRoles($roles);
        }else{
            $user->roles()->detach();
        }

        $user->refresh();
        
        return new UserResource($user);
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
    }
}
