<?php

namespace App\Models;

use App\Helpers\AppHelpers;
use App\Interfaces\SearchableModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole implements SearchableModel
{
    use HasFactory;


    public function scopeSearch($q, $term, $officeId = null): Collection
    {
        return ModelsRole::all();
        return ModelsRole::where('name', 'ilike', "%{$term}%");
        // return AppHelpers::keywordSearch($q, ['id', 'name'], $term);
    }
}
