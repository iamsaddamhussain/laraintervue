<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleListingRequest;
use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
  public function index(RoleListingRequest $request): DatatableBuilder
  {
    return new DatatableBuilder(
      $request->applyListingFilters(Role::query())
    );
  }

  public function store(RoleRequest $request): mixed
  {
    return $this->handleForm($request, new Role);
  }

  public function update(RoleRequest $request, Role $role): mixed
  {
    return $this->handleForm($request, $role);
  }

  public function show(string $roleId): Role
  {
    return Role::with('permissions')->findOrFail($roleId);
  }
  private function handleForm(RoleRequest $request, Role $role): mixed
  {
    $role->name = $request->name;
    $role->save();
    $role->syncPermissions($request->permissions);
    return $role;
  }
}
