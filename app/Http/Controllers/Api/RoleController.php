<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// insert role model
use Spatie\Permission\Models\Role;

// request validations
use App\Http\Requests\storeRole;

// resources
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleCollection;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RoleCollection(Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRole $request)
    {
        $validatedRole = $request->only('name');
        $role = Role::create($validatedRole);

        $permissions = $request->permissions;

        if(isset($permissions)){
            foreach($permissions as $permission){
                $retrievedPermission = Permission::where('id', $permission)->firstOrFail();
                $role->givePermissionTo($retrievedPermission);
            }
        }

        $role->refresh();
        
        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeRole $request, $id)
    {
        // retrieve the role instance from the database
        $role = Role::findOrFail($id);

        // retrieve validated data
        $role->name = $request->name;

        $role->save();

        $permissions = $request->permissions;

        if(isset($permissions)){
            foreach($permissions as $permission){
                $retrievedPermission = Permission::where('id', $permission)->firstOrFail();
                $role->givePermissionTo($retrievedPermission);
            }
        }
        
        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}
