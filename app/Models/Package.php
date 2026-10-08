<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    public function features() :HasMany
    {
        return $this->hasMany(PackageFeature::class);
    }
}
