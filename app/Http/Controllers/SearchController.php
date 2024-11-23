<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Role;

class SearchController extends Controller
{
    const ROLE = 'role';
    public function index(SearchRequest $request, string $morphName)
    {
        switch ($morphName) {
            case self::ROLE:
                return $this->searchRole($request);
        }
    }

    private function searchRole(SearchRequest $request)
    {
        return Role::search($request->terms)
            ->take($request->limit ?: 20);
    }
}
