<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function allPermissions(){
        $permissions = Permission::all();
        return view('permissions.permissions', compact('permissions'));
    }// End

    // Return permissions form
    public function addPermission(){
        return view('permissions.add_permission');
    }

    // Save permissions
    public function storePermission(Request $request){
        
        $request->validate([
            'name' => 'required|unique:permissions',
            'group_name' => 'required'
        ]);

        Permission::insert([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
    }
}
