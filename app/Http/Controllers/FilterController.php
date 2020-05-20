<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hallazgo;

class FilterController extends Controller
{
    public function getFindings(){
        return datatables()->eloquent(Hallazgo::query())
        ->addColumn('memorandum', function($data){ return $data->memorandum; })
        ->addColumn('leaderAudit_id', function($data){ return $data->leaderAudit->name;})
        ->addColumn('auditGroup_id', function($data){ return $data->groupAudit->name;})
        ->addColumn('typeFinding_id', function($data){ return $data->typesFind->name;})
        ->addColumn('responsibles', function($data){ return $data->responsibles;})
        ->addColumn('valueFindings', function($data){ return $data->valueFindings;})
        ->addColumn('validityAudit', function($data){ return $data->validityAudit.' (Días)';})
        ->addColumn('dateEndAudit', function($data){ return $data->dateEndAudit.' (Días)';})
        ->addColumn('timeFindings', function($data){ return $data->timeFindings;})
        ->addColumn('dateTransfers', function($data){ return $data->dateTransfers;})
        ->addColumn('created_at', function($data){ return $data->created_at;})
        ->addColumn('actions', 'buttom.btnTableFinding')
        ->rawColumns(['actions'])
        ->toJson();
    }
}
