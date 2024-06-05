<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create(['name' => $request->name]);

        return redirect('admin/permissions')->with('success','Permission added successfully');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->name
            ]
        ]);

        $permission->update(['name' => $request->name]);

        return redirect('admin/permissions')->with('success','Permission updated successfully');
    }

    public function destroy($permissionID)
    {
        $permission = Permission::find($permissionID);
        $permission->delete();
        return redirect('admin/permissions')->with('deleted','Permission deleted successfully');

    }
}
