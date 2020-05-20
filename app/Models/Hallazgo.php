<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TypeFinding;
use App\User;

class Hallazgo extends Model
{
    protected $fillable = [
        'auditGroup_id','dateEndAudit','dateTransfers','memorandum','leaderAudit_id','responsibles','timeFindings','validityAudit','valueFindings','uploadFinding','typeFinding_id'
    ];

    public function typesFind()
    {
        return $this->belongsTo(TypeFinding::class, 'typeFinding_id');
    }
    public function groupAudit()
    {
        return $this->belongsTo(AuditGroup::class, 'auditGroup_id');
    }
    public function leaderAudit()
    {
        return $this->belongsTo(User::class, 'leaderAudit_id');
    }
}
