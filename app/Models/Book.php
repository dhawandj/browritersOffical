<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected  $guarded = [];

      /**
     * Get the orders for the Users
     */
    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

}
