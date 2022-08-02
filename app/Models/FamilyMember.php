<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    public $timestamps = false;

    // public $appends = ["children"];

    public function children()
    {
        return $this->hasMany(FamilyMember::class, "parent_id");
    }

    public function offsprings()
    {
        return $this->hasMany(FamilyMember::class, "parent_id")->with("children");
    }

    public function siblingsBuilder()
    {
        return $this->hasMany(FamilyMember::class, "parent_id", "parent_id");
    }

    public function siblings()
    {
        return $this->hasMany(FamilyMember::class, "parent_id", "parent_id");
    }

    // public function getChildrenAttribute()
    // {
    //     return $this->children()->get();
    // }
}
