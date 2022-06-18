<?php

namespace App\Http\Controllers\Central\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\Backend\Role\StoreRoleRequest;
use App\Http\Requests\Central\Backend\Role\UpdateRoleRequest;
use App\Models\Central\Auth\Role;
use App\Services\Central\PermissionService;
use App\Services\Central\RoleService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    private $roleService;
    /**
     * @var PermissionService
     */
    private $permissionService;

    /**
     * RoleController constructor.
     */
    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('central.backend.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('central.backend.role.create')->with([
            'permissions' => $this->permissionService->getCategorizedPermissions(),
            'general_permissions' => $this->permissionService->getUncategorizedPermissions()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleService->store($request->validated());
        session()->flash('flash_success', 'The role was successfully created.');
        return redirect()->route('central.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Role $role)
    {
        return view('central.backend.role.show')->with([
            'role' => $role,
            'permissions' => $this->permissionService->getCategorizedPermissions(),
            'general_permissions' => $this->permissionService->getUncategorizedPermissions(),
            'usedPermissions' => $role->permissions->modelKeys()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(Role $role)
    {
        return view('central.backend.role.edit')->with([
            'role' => $role,
            'permissions' => $this->permissionService->getCategorizedPermissions(),
            'general_permissions' => $this->permissionService->getUncategorizedPermissions(),
            'usedPermissions' => $role->permissions->modelKeys()
        ]);
    }

    /**
     * @param UpdateRoleRequest $request
     * @param Role $role
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleService->update($role, $request->validated());
        session()->flash('flash_success', 'The role was successfully updated.');
        return redirect()->route('central.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
