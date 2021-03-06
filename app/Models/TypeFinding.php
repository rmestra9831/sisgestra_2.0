<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hallazgo;
use App\User;

class TypeFinding extends Model
{
    protected $fillable = ['name','count'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
