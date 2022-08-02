<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function children()
    {
        return $this->hasMany(FamilyMember::class, "parent_id");
    }
}
