<?php

namespace App\Http\Controllers;

use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;

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

    public function editPermissions($id){
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }

    public function updatePermission(Request $request){

        Permission::findorFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'Permission updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
        
    }

    public function deletePermission($id){

        Permission::findorFail($id)->delete();

        $notification = array(
            'message' => 'Permission deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function importPermissionForm(){
        return view('permissions.import');
    }

    public function importPermission(Request $request){
        
        Excel::import(new PermissionImport, $request->file('perm_file'));

        $notification = array(
            'message' => 'Permission imported successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function exportPermission(){
        return Excel::download(new PermissionExport, 'permissions.xlsx');
    }
}
