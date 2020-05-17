<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hallazgo;

class FilterController extends Controller
{
    public function getFindings(){
        return datatables()->eloquent(Hallazgo::query())
        ->addColumn('memorandum', function($data){ return $data->memorandum; })
        ->addColumn('leaderAudit', function($data){ return $data->leaderAudit;})
        ->addColumn('auditGroup', function($data){ return $data->auditGroup;})
        ->addColumn('typeFinding', function($data){ return $data->typeFinding;})
        ->addColumn('responsibles', function($data){ return $data->responsibles;})
        ->addColumn('valueFindings', function($data){ return $data->valueFindings;})
        ->addColumn('validityAudit', function($data){ return $data->validityAudit.' (Días)';})
        ->addColumn('dateEndAudit', function($data){ return $data->dateEndAudit.' (Días)';})
        ->addColumn('timeFindings', function($data){ return $data->timeFindings;})
        ->addColumn('dateTransfers', function($data){ return $data->dateTransfers;})
        ->addColumn('actions', 'buttom.btnTableFinding')
        ->rawColumns(['actions'])
        ->toJson();
    }
}
