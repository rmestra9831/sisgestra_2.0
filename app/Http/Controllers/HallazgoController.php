<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AuditGroup;
use App\Models\TypeFinding;
use App\Models\Hallazgo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        $hallazgo->slug = $request->memorandum;
        $hallazgo->file = $request->file('uploadFinding')->storeAs('public/fingins','hallazgo'.$request->memorandum.'.pdf');
        
        $typeFinding = TypeFinding::where('id',$request->typeFinding)->first();
        $typeFinding->increment('count');
        $hallazgo->slug = $request->memorandum;
        $hallazgo->save();

        return redirect()->route('indexFindings')->with('status','Creado');
    }
    public function TypeFindings(){
        $findings = Hallazgo::get();
        // dd($findings->typesFind->name);
        return view('pages.masterFinding', compact('findings'));

    }
    public function editFindingView($slug){
        $typeFinding = TypeFinding::get();
        $auditGroup  = AuditGroup::get();
        $finding = Hallazgo::where('slug',$slug)->first();
        return view('pages.editFinding', compact(['finding','typeFinding','auditGroup']));
    }
    public function updateFinding(Request $request, $slug){
        $typeFinding = TypeFinding::get();
        $auditGroup  = AuditGroup::get();
        $finding = Hallazgo::where('slug',$slug)->first();
        if ($finding->leaderAudit->id == auth()->user()->id) {
            $finding->update([
                'auditGroup_id' => $request->auditGroup,
                'dateEndAudit' => $request->dateEndAudit,
                'dateTransfers' => $request->dateTransfers,
                'memorandum' => $request->memorandum,
                'responsibles' => $request->responsibles,
                'timeFindings' => $request->timeFindings,
                'validityAudit' => $request->validityAudit,
                'valueFindings' => str_replace(',','',$request->valueFindings),
                'typeFinding_id' => $request->typeFinding,
                'updated_at' => now()
            ]);
            return redirect()->route('editFindingView',[$slug])->with('status','Editado');    
        }else{
            return redirect()->route('editFindingView',[$slug])->with('error','error');
        }
    }
    public function deleteFinding(Request $request, $slug){
        if ($request->ajax()) {
            // dd($slug);
            $finding = Hallazgo::where('slug',$slug)->first();
            $finding->delete();
            return response()->json($slug);
        }
    }
    public function viewFindingByAll($slug){
        $typeFinding = TypeFinding::get();
        $auditGroup  = AuditGroup::get();
        $finding = Hallazgo::where('slug',$slug)->first();    
        return view('pages.viewFinding', compact(['finding','typeFinding','auditGroup']));
    }
    public function downloadFile($slug){
        $finding = Hallazgo::where('slug',$slug)->firstOrFail();    
        return Storage::download($finding->file);
    }
}
