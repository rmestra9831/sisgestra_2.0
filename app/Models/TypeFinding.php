<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hallazgo;

class TypeFinding extends Model
{
    protected $fillable = ['name','count'];

    public function finding()
    {
        return $this->hasMany(Hallazgo::class);
    }
}
