<?php

namespace App\Http\Controllers\Central\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\Backend\User\DeleteUserRequest;
use App\Http\Requests\Central\Backend\User\StoreUserRequest;
use App\Http\Requests\Central\Backend\User\UpdateUserRequest;
use App\Services\Central\AdminService;
use App\Services\Central\RoleService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @var AdminService
     */
    private $adminService;
    /**
     * @var RoleService
     */
    private $roleService;

    /**
     * UserController constructor.
     * @param AdminService $adminService
     * @param RoleService $roleService
     */
    public function __construct(AdminService $adminService, RoleService $roleService)
    {
        $this->adminService = $adminService;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('central.backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('central.backend.user.create')
            ->withRoles($this->roleService->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreUserRequest $request)
    {
        $this->adminService->store($request->validated());
        session()->flash('flash_success', 'User successfully created.');
        return redirect()->route('central.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $admin = $this->adminService->getById($id);
        return view('central.backend.user.show')
            ->withAdmin($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = $this->adminService->getById($id);
        return view('central.backend.user.edit')
            ->withAdmin($admin)
            ->withRoles($this->roleService->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $admin = $this->adminService->getById($id);
        $this->adminService->update($admin, $request->validated());
        session()->flash('flash_success', 'User successfully updated.');
        return redirect()->route('central.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(DeleteUserRequest $request, $id)
    {
        //
    }
}
