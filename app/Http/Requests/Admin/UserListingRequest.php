<?php

namespace App\Http\Requests\Admin;

use App\Traits\DatatableRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserListingRequest extends FormRequest
{
    use DatatableRequest;

    public function rules(): array
    {
        return $this->datatableRules();
    }

    public function applyListingFilters($builder)
    {
        if ($this->quicksearch) {
            return $builder;
        }

        return $builder;
    }
}
