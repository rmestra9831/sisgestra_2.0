<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AuditGroup;
use App\Models\TypeFinding;
use App\Models\Hallazgo;

class HallazgoController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }
    public function index(){
        $auditGroup = AuditGroup::get();
        $typeFinding = TypeFinding::get();
        return view('findings.index', compact('auditGroup','typeFinding'));
    }
    public function store(Request $request){

        $hallazgo = new Hallazgo();

        $hallazgo->auditGroup_id = $request->auditGroup;
        $hallazgo->dateEndAudit = $request->dateEndAudit;
        $hallazgo->dateTransfers = $request->dateTransfers;
        $hallazgo->memorandum = $request->memorandum;
        $hallazgo->leaderAudit_id = auth()->user()->id;
        $hallazgo->responsibles = $request->responsibles;
        $hallazgo->timeFindings = $request->timeFindings;
        $hallazgo->validityAudit = $request->validityAudit;
        $hallazgo->valueFindings = str_replace(',','',$request->valueFindings);
        $hallazgo->typeFinding_id = $request->typeFinding;
        $hallazgo->file = $request->file('uploadFinding')->storeAs('public/fingins','hallazgo'.$request->memorandum.'.pdf');
        $hallazgo->save();

        return redirect()->route('indexFindings')->with('status','Creado');
    }
    public function TypeFindings(){
        $findings = Hallazgo::get();
        // dd($findings->typesFind->name);
        return view('pages.masterFinding', compact('findings'));

    }
    public function editFinding($slug){
        dd($slug);
    }
}
