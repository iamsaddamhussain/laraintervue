<?php

namespace App\Http\Controllers;

use App\Helpers\DatatableBuilder;
use App\Http\Requests\Admin\UserFormRequest;
use App\Http\Requests\Admin\UserListingRequest;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index(UserListingRequest $request): DatatableBuilder
    {
        return new DatatableBuilder(
            $request->applyListingFilters(User::listing())
        );
    }

    public function store(UserFormRequest $request): mixed
    {
        $this->authorize('create-user', User::class);
        return $this->handleForm($request, new User);
    }

    public function update(UserFormRequest $request, User $user): mixed
    {
        return $this->handleForm($request, $user);
    }
    public function show(User $user): mixed
    {
        return response()->json($user);
    }

    private function handleForm(UserFormRequest $request, User $user): mixed
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->assignRole($request->role['name']);
        return $user->save();
    }
}
