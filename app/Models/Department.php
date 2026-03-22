<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'campus_id'];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function research()
    {
        return $this->hasMany(Research::class);
    }
}
