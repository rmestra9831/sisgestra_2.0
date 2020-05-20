<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hallazgo;
class AuditGroup extends Model
{
    public function finding()
    {
        return $this->hasMany(Hallazgo::class);
    }
}
